<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    // Update profile information
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'dob' => 'nullable|date',
            'bio' => 'nullable|string|max:500'
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ], 422);
        }
        
        $user->update($request->only(['fullname', 'email', 'phone', 'dob', 'bio']));
        
        return response()->json([
            'success' => true,
            'message' => 'Profile updated successfully'
        ]);
    }
    
    // Change password
    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed'
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ], 422);
        }
        
        $user = Auth::user();
        
        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Current password is incorrect'
            ], 401);
        }
        
        $user->update([
            'password' => Hash::make($request->new_password)
        ]);
        
        return response()->json([
            'success' => true,
            'message' => 'Password changed successfully'
        ]);
    }
    
    // Get user orders
    public function getOrders()
    {
        // Return empty array if Order model doesn't exist yet
        try {
            $orders = Order::where('user_id', Auth::id())
                ->orderBy('created_at', 'desc')
                ->get();
        } catch (\Exception $e) {
            $orders = collect([]);
        }
        
        return response()->json($orders);
    }
    
    // Get user addresses
    public function getAddresses()
    {
        try {
            $addresses = Address::where('user_id', Auth::id())
                ->orderBy('is_default', 'desc')
                ->orderBy('created_at', 'desc')
                ->get();
        } catch (\Exception $e) {
            $addresses = collect([]);
        }
        
        return response()->json($addresses);
    }
    
    // Add new address
    public function addAddress(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'address_line1' => 'required|string|max:255',
            'address_line2' => 'nullable|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'zip_code' => 'required|string|max:20',
            'country' => 'required|string|max:100',
            'is_default' => 'nullable|boolean'
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ], 422);
        }
        
        // If this is the default address, remove default from others
        if ($request->is_default) {
            Address::where('user_id', Auth::id())->update(['is_default' => false]);
        }
        
        $address = Address::create([
            'user_id' => Auth::id(),
            'address_line1' => $request->address_line1,
            'address_line2' => $request->address_line2,
            'city' => $request->city,
            'state' => $request->state,
            'zip_code' => $request->zip_code,
            'country' => $request->country,
            'is_default' => $request->is_default ?? false
        ]);
        
        // If this is the first address, make it default
        if (Address::where('user_id', Auth::id())->count() === 1) {
            $address->update(['is_default' => true]);
        }
        
        return response()->json([
            'success' => true,
            'message' => 'Address added successfully',
            'address' => $address
        ]);
    }
    
    // Set default address
    public function setDefaultAddress($id)
    {
        Address::where('user_id', Auth::id())->update(['is_default' => false]);
        
        $address = Address::where('user_id', Auth::id())
            ->where('id', $id)
            ->firstOrFail();
        
        $address->update(['is_default' => true]);
        
        return response()->json([
            'success' => true,
            'message' => 'Default address updated'
        ]);
    }
    
    // Delete address
    public function deleteAddress($id)
    {
        $address = Address::where('user_id', Auth::id())
            ->where('id', $id)
            ->firstOrFail();
        
        $wasDefault = $address->is_default;
        $address->delete();
        
        // If we deleted the default address, set another one as default if available
        if ($wasDefault) {
            $newDefault = Address::where('user_id', Auth::id())->first();
            if ($newDefault) {
                $newDefault->update(['is_default' => true]);
            }
        }
        
        return response()->json([
            'success' => true,
            'message' => 'Address deleted successfully'
        ]);
    }
}