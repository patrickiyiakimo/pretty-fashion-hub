<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            // Gowns & Evening Dresses
            [
                'name' => 'Royal Purple Velvet Gown',
                'slug' => 'royal-purple-velvet-gown',
                'description' => 'Stunning floor-length velvet gown in rich royal purple. Perfect for galas, weddings, and formal events. Features an elegant cowl neck and side slit. The luxurious velvet fabric drapes beautifully and catches the light perfectly. Pair with gold accessories for a truly regal look.',
                'price' => 349.99,
                'compare_price' => 549.99,
                'sku' => 'GWN-001',
                'category' => 'gowns',
                'images' => json_encode([
                    'https://images.unsplash.com/photo-1566174053879-31528523f8ae?w=600',
                    'https://images.unsplash.com/photo-1595777457583-95e059d581b8?w=600',
                    'https://images.unsplash.com/photo-1539008835657-9e8e9680c956?w=600'
                ]),
                'sizes' => json_encode(['XS', 'S', 'M', 'L', 'XL', 'XXL']),
                'colors' => json_encode(['#800080', '#4B0082', '#9370DB']),
                'stock' => 15,
                'featured' => true,
                'new_arrival' => true,
                'on_sale' => true,
            ],
            [
                'name' => 'Gold Sequin Evening Gown',
                'slug' => 'gold-sequin-evening-gown',
                'description' => 'Dazzling gold sequin gown that makes you shine at any event. Perfect for Festive season, proms, and red carpet events. Fully lined with a zip-up back and train. Get ready to turn heads wherever you go.',
                'price' => 399.99,
                'compare_price' => 599.99,
                'sku' => 'GWN-002',
                'category' => 'gowns',
                'images' => json_encode([
                    'https://images.unsplash.com/photo-1591041716574-ecfba9e5f6bd?w=600',
                    'https://images.unsplash.com/photo-1539008835657-9e8e9680c956?w=600'
                ]),
                'sizes' => json_encode(['S', 'M', 'L', 'XL']),
                'colors' => json_encode(['#FFD700', '#DAA520']),
                'stock' => 8,
                'featured' => true,
                'new_arrival' => true,
                'on_sale' => false,
            ],
            [
                'name' => 'Black Mermaid Evening Dress',
                'slug' => 'black-mermaid-evening-dress',
                'description' => 'Elegant black mermaid-style evening dress with lace detailing. Fitted through the bodice and hips, flaring out at the knee. Perfect for formal events, galas, and black-tie weddings. Features a sheer lace back.',
                'price' => 279.99,
                'compare_price' => 429.99,
                'sku' => 'GWN-003',
                'category' => 'gowns',
                'images' => json_encode([
                    'https://images.unsplash.com/photo-1490481651871-ab68de25d43d?w=600',
                    'https://images.unsplash.com/photo-1515372039744-b8f02a3ae446?w=600'
                ]),
                'sizes' => json_encode(['XS', 'S', 'M', 'L', 'XL']),
                'colors' => json_encode(['#000000', '#1a1a1a']),
                'stock' => 12,
                'featured' => true,
                'new_arrival' => false,
                'on_sale' => true,
            ],

            // Casual Dresses
            [
                'name' => 'Floral Summer Maxi Dress',
                'slug' => 'floral-summer-maxi-dress',
                'description' => 'Beautiful floral print maxi dress perfect for summer days and beach vacations. Lightweight and breathable fabric with adjustable straps. Features a flowy silhouette and vibrant colors that capture the essence of summer.',
                'price' => 89.99,
                'compare_price' => 129.99,
                'sku' => 'DRS-001',
                'category' => 'dresses',
                'images' => json_encode([
                    'https://images.unsplash.com/photo-1515372039744-b8f02a3ae446?w=600',
                    'https://images.unsplash.com/photo-1495385794356-15371f348c31?w=600'
                ]),
                'sizes' => json_encode(['S', 'M', 'L', 'XL']),
                'colors' => json_encode(['#FF69B4', '#FFB6C1', '#FF1493']),
                'stock' => 35,
                'featured' => true,
                'new_arrival' => true,
                'on_sale' => false,
            ],
            [
                'name' => 'Bohemian Crochet Dress',
                'slug' => 'bohemian-crochet-dress',
                'description' => 'Free-spirited bohemian crochet dress perfect for festivals and vacation. Handmade crochet details with a relaxed fit. Pair with sandals and a floppy hat for the ultimate boho look.',
                'price' => 119.99,
                'compare_price' => null,
                'sku' => 'DRS-002',
                'category' => 'dresses',
                'images' => json_encode([
                    'https://images.unsplash.com/photo-1539008835657-9e8e9680c956?w=600',
                    'https://images.unsplash.com/photo-1515372039744-b8f02a3ae446?w=600'
                ]),
                'sizes' => json_encode(['S', 'M', 'L']),
                'colors' => json_encode(['#F5DEB3', '#FFF8DC', '#DEB887']),
                'stock' => 20,
                'featured' => false,
                'new_arrival' => true,
                'on_sale' => false,
            ],

            // Handbags
            [
                'name' => 'Luxury Leather Tote Bag',
                'slug' => 'luxury-leather-tote-bag',
                'description' => 'Premium genuine leather tote bag in rich burgundy. Spacious enough for your laptop, tablet, and daily essentials. Features gold hardware, interior zip pocket, and detachable shoulder strap. Perfect for work and weekend.',
                'price' => 249.99,
                'compare_price' => 399.99,
                'sku' => 'BAG-001',
                'category' => 'bags',
                'images' => json_encode([
                    'https://images.unsplash.com/photo-1584917865442-de89df76afd3?w=600',
                    'https://images.unsplash.com/photo-1548036328-c9fa89d128fa?w=600'
                ]),
                'sizes' => json_encode(['One Size']),
                'colors' => json_encode(['#800080', '#8B0000', '#DAA520']),
                'stock' => 10,
                'featured' => true,
                'new_arrival' => true,
                'on_sale' => true,
            ],
            [
                'name' => 'Crossbody Purse with Gold Chain',
                'slug' => 'crossbody-purse-gold-chain',
                'description' => 'Elegant crossbody purse with detachable gold chain strap. Compact yet spacious enough for phone, cards, and makeup. Perfect for evening events and daily use. Available in multiple colors.',
                'price' => 89.99,
                'compare_price' => 149.99,
                'sku' => 'BAG-002',
                'category' => 'bags',
                'images' => json_encode([
                    'https://images.unsplash.com/photo-1590874103328-eac38a683ce7?w=600',
                    'https://images.unsplash.com/photo-1566150905458-1bf1fc113f0d?w=600'
                ]),
                'sizes' => json_encode(['One Size']),
                'colors' => json_encode(['#800080', '#FFD700', '#000000']),
                'stock' => 25,
                'featured' => false,
                'new_arrival' => true,
                'on_sale' => false,
            ],

            // Earrings & Jewelry
            [
                'name' => 'Gold Hoop Earrings with Crystals',
                'slug' => 'gold-hoop-earrings-crystals',
                'description' => 'Stunning gold hoop earrings embellished with sparkling crystals. Lightweight and comfortable for all-day wear. Perfect for both casual and formal occasions. Hypoallergenic and nickel-free.',
                'price' => 49.99,
                'compare_price' => 79.99,
                'sku' => 'EAR-001',
                'category' => 'earrings',
                'images' => json_encode([
                    'https://images.unsplash.com/photo-1635767798638-3665c5a2d0b4?w=600',
                    'https://images.unsplash.com/photo-1535632066927-ab7c9ab60908?w=600'
                ]),
                'sizes' => json_encode(['One Size']),
                'colors' => json_encode(['#FFD700', '#DAA520']),
                'stock' => 50,
                'featured' => true,
                'new_arrival' => true,
                'on_sale' => true,
            ],
            [
                'name' => 'Purple Gemstone Drop Earrings',
                'slug' => 'purple-gemstone-drop-earrings',
                'description' => 'Elegant drop earrings featuring genuine purple amethyst gemstones set in sterling silver. The perfect accessory to complement purple and gold outfits. Comes in a beautiful gift box.',
                'price' => 79.99,
                'compare_price' => 129.99,
                'sku' => 'EAR-002',
                'category' => 'earrings',
                'images' => json_encode([
                    'https://images.unsplash.com/photo-1535632066927-ab7c9ab60908?w=600',
                    'https://images.unsplash.com/photo-1617038260897-41a1f14a8ca0?w=600'
                ]),
                'sizes' => json_encode(['One Size']),
                'colors' => json_encode(['#800080', '#9370DB']),
                'stock' => 30,
                'featured' => true,
                'new_arrival' => false,
                'on_sale' => false,
            ],

            // Shoes
            [
                'name' => 'Gold Strappy Heeled Sandals',
                'slug' => 'gold-strappy-heeled-sandals',
                'description' => 'Gorgeous gold strappy heeled sandals perfect for parties and special events. 4-inch stiletto heel with ankle strap for secure fit. Comfortable cushioned insole. Pair perfectly with gowns and evening dresses.',
                'price' => 99.99,
                'compare_price' => 159.99,
                'sku' => 'Shoe-001',
                'category' => 'shoes',
                'images' => json_encode([
                    'https://images.unsplash.com/photo-1543163521-1bf539c55dd2?w=600',
                    'https://images.unsplash.com/photo-1549298916-b41d501d3772?w=600'
                ]),
                'sizes' => json_encode(['36', '37', '38', '39', '40', '41']),
                'colors' => json_encode(['#FFD700', '#DAA520']),
                'stock' => 20,
                'featured' => true,
                'new_arrival' => true,
                'on_sale' => true,
            ],
            [
                'name' => 'Purple Velvet Block Heels',
                'slug' => 'purple-velvet-block-heels',
                'description' => 'Luxurious purple velvet block heels with comfortable 3-inch heel. Perfect for all-day wear at weddings and events. Features cushioned footbed and non-slip sole. The velvet adds a touch of elegance to any outfit.',
                'price' => 89.99,
                'compare_price' => null,
                'sku' => 'Shoe-002',
                'category' => 'shoes',
                'images' => json_encode([
                    'https://images.unsplash.com/photo-1533867617858-e7b97e060509?w=600',
                    'https://images.unsplash.com/photo-1543163521-1bf539c55dd2?w=600'
                ]),
                'sizes' => json_encode(['36', '37', '38', '39', '40']),
                'colors' => json_encode(['#800080', '#4B0082']),
                'stock' => 15,
                'featured' => false,
                'new_arrival' => true,
                'on_sale' => false,
            ],

            // Tops & Blouses
            [
                'name' => 'Silk Purple Blouse',
                'slug' => 'silk-purple-blouse',
                'description' => 'Elegant pure silk blouse in beautiful lavender purple. Perfect for office wear or evening dates. Features a classic collar, button-front design, and relaxed fit. The silk fabric feels luxurious against the skin.',
                'price' => 79.99,
                'compare_price' => 129.99,
                'sku' => 'TOP-001',
                'category' => 'tops',
                'images' => json_encode([
                    'https://images.unsplash.com/photo-1564257631407-4deb1f99d992?w=600',
                    'https://images.unsplash.com/photo-1598550874175-4d0ef436c909?w=600'
                ]),
                'sizes' => json_encode(['XS', 'S', 'M', 'L', 'XL']),
                'colors' => json_encode(['#9370DB', '#800080', '#DDA0DD']),
                'stock' => 25,
                'featured' => true,
                'new_arrival' => true,
                'on_sale' => false,
            ],
            [
                'name' => 'Off-Shoulder Ruffled Top',
                'slug' => 'off-shoulder-ruffled-top',
                'description' => 'Romantic off-shoulder ruffled top in cream white. Perfect for date nights and summer parties. Elastic off-shoulder design with多层 ruffles. Pair with high-waisted jeans or skirts.',
                'price' => 59.99,
                'compare_price' => 89.99,
                'sku' => 'TOP-002',
                'category' => 'tops',
                'images' => json_encode([
                    'https://images.unsplash.com/photo-1529139574466-a303027c1d8b?w=600',
                    'https://images.unsplash.com/photo-1539008835657-9e8e9680c956?w=600'
                ]),
                'sizes' => json_encode(['S', 'M', 'L']),
                'colors' => json_encode(['#FFFFFF', '#FFF5EE', '#FFF8DC']),
                'stock' => 30,
                'featured' => false,
                'new_arrival' => true,
                'on_sale' => true,
            ],

            // Bottoms
            [
                'name' => 'High-Waisted Purple Trousers',
                'slug' => 'high-waisted-purple-trousers',
                'description' => 'Sophisticated high-waisted trousers in plum purple. Tailored fit with a modern wide-leg silhouette. Perfect for professional settings and formal occasions. Features front pleats and back zip closure.',
                'price' => 119.99,
                'compare_price' => 179.99,
                'sku' => 'BOT-001',
                'category' => 'bottoms',
                'images' => json_encode([
                    'https://images.unsplash.com/photo-1594938298603-c8148c4dae35?w=600',
                    'https://images.unsplash.com/photo-1591195853828-11db59a44f6b?w=600'
                ]),
                'sizes' => json_encode(['XS', 'S', 'M', 'L', 'XL']),
                'colors' => json_encode(['#800080', '#4B0082', '#6A0DAD']),
                'stock' => 18,
                'featured' => true,
                'new_arrival' => false,
                'on_sale' => false,
            ],

            // Outerwear
            [
                'name' => 'Purple Wool Blend Coat',
                'slug' => 'purple-wool-blend-coat',
                'description' => 'Elegant long wool blend coat in deep purple. Keep warm in style during winter months. Features oversized lapels, side pockets, and a belt at the waist. Perfect for professional and casual wear.',
                'price' => 249.99,
                'compare_price' => 399.99,
                'sku' => 'OUT-001',
                'category' => 'outerwear',
                'images' => json_encode([
                    'https://images.unsplash.com/photo-1539533113208-f6df8cc8b543?w=600',
                    'https://images.unsplash.com/photo-1544022613-e87ca75a784a?w=600'
                ]),
                'sizes' => json_encode(['S', 'M', 'L', 'XL']),
                'colors' => json_encode(['#800080', '#483D8B', '#4B0082']),
                'stock' => 12,
                'featured' => false,
                'new_arrival' => true,
                'on_sale' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
        
        $this->command->info('Products seeded successfully! Added ' . count($products) . ' products.');
    }
}