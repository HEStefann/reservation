<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Restaurant;
use App\Models\WorkingHour;
use App\Models\RestaurantImage;
use App\Models\Image;
use App\Models\Menu;
use App\Models\Product;
use App\Models\Review;
use App\Models\Reservation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $realRestaurantData = [
            [
                'name' => 'BURGER KING CITY MALL',
                'description' => 'Burger King (Skopje City Mall) is located in Skopje. Burger King (Skopje City Mall) is working in Fast food restaurants activities. You can find more information about Burger King (Skopje City Mall) at www.bk.com.',
                'available_people' => 230,
                'lat' => 42.0047741,
                'lng' => 21.3868903,
                'address' => 'Ljubljanska, Skopje 1000',
                'image' => 'https://logowik.com/content/uploads/images/310_burgerking.jpg',
                'menus' => [ 'categories' => [
                        'Menu' => [
                            [
                                'name' => '6 KING NUGGETS MENU',
                                'price' => '355',
                            ],
                            [
                                'name' => '9 KING NUGGETS MENU',
                                'price' => '400',
                            ],
                            [
                                'name' => 'BIG KING MENU',
                                'price' => '440',
                            ],
                            [
                                'name' => 'BIG KING XXL MENU',
                                'price' => '600',
                            ],
                            [
                                'name' => 'CHEESEBURGER MENU',
                                'price' => '300',
                            ],
                            [
                                'name' => 'CHICKEN BBQ DELUXE MENU',
                                'price' => '355',
                            ],
                            [
                                'name' => 'CHICKEN BURGER MENU',
                                'price' => '295',
                            ],
                            [
                                'name' => 'CHICKEN ROYALE CHEESE MENU',
                                'price' => '510',
                            ],
                            [
                                'name' => 'CHICKEN ROYALE MENU',
                                'price' => '480',
                            ],
                            [
                                'name' => 'CRISPY CHICKEN CHEESE MENU',
                                'price' => '385',
                            ],
                            [
                                'name' => 'CRISPY CHICKEN MENU',
                                'price' => '370',
                            ],
                        ],

                        'KIDS MEAL' => [
                            [
                                'name' => 'KIDS CHEESEBURGER MENU + TOY',
                                'price' => '330',
                            ],
                            [
                                'name' => 'KIDS HAMBURGER MENU + TOY',
                                'price' => '315',
                            ],
                            [
                                'name' => 'KIDS CHICKENBURGER MENU + TOY',
                                'price' => '325',
                            ],
                            [
                                'name' => 'KIDS NUGGETS MENU + TOY',
                                'price' => '315',
                            ],
                        ],
                        
                        'BURGER' => [
                                [
                                    'name' => 'BIG KING',
                                    'price' => '335',
                                ],
                                [
                                    'name' => 'BIG KING XXL',
                                    'price' => '410',
                                ],
                                [
                                    'name' => 'CHEESEBURGER',
                                    'price' => '180',
                                ],
                                [
                                    'name' => 'CHICKEN ROYALE',
                                    'price' => '330',
                                ],
                                [
                                    'name' => 'CHICKEN ROYALE CHEESE',
                                    'price' => '360',
                                ],
                                [
                                    'name' => 'CHICKEN BBQ DELUXE',
                                    'price' => '220',
                                ],
                                [
                                    'name' => 'CHICKEN BURGER',
                                    'price' => '185',
                                ],
                                [
                                    'name' => 'CRISPY CHICKEN',
                                    'price' => '230',
                                ],
                                [
                                    'name' => 'CRISPY CHICKEN CHEESE',
                                    'price' => '245',
                                ],
                                [
                                    'name' => 'DOUBLE WHOPPER',
                                    'price' => '420',
                                ],
                                [
                                    'name' => 'DOUBLE WHOPPER CHEESE',
                                    'price' => '450',
                                ],
                                ]
                            ]
                        ]
            ],
            [
                'name' => 'KFC',
                'address' => 'City Mall (Food Corner, Ljubljanska 4, Skopje 1000)',
                'available_people' => 230,
                'lat' => 42.0047741,
                'lng' => 21.3868903,
                'description' => 'KFC is located in Skopje. KFC is working in Fast food restaurants activities. You can find more information about KFC at www.kfc.com.',
                'image' => 'https://www.pngkit.com/png/detail/50-508776_kfc-logo.png',
                'menus' => [ 'categories' => [
                    'BURGERI' => [
                        [
                            'name' => 'Cheeseburger',
                            'description' => 'Cheeseburger',
                            'price' => '139'
                        ],
                        [
                            'name' => 'Sanders Burger',
                            'description' => 'Sanders Burger',
                            'price' => '179',
                        ],
                        [
                            'name' => 'Fillet Burger',
                            'description' => 'Fillet Burger',
                            'price' => '199',
                        ],
                        [
                            'name' => 'Fillet Burger - Hot \'N\' Spicy',
                            'description' => 'Fillet Burger - Hot \'N\' Spicy',
                            'price' => '199',
                        ],
                        [
                            'name' => 'Tower Burger',
                            'description' => 'Tower Burger',
                            'price' => '269',
                        ],
                        [
                            'name' => 'Tower Burger - Hot \'N\' Spicy',
                            'description' => 'Tower Burger - Hot \'N\' Spicy',
                            'price' => '269',
                        ],
                        [
                            'name' => 'Triple Double',
                            'description' => 'Triple Double',
                            'price' => '319',
                        ],
                        [
                            'name' => 'Double Cheeseburger',
                            'description' => 'Double Cheeseburger',
                            'price' => '199',
                        ],
                        [
                            'name' => 'Double Fillet Buger',
                            'description' => 'Double Fillet Buger',
                            'price' => '339',
                        ],
                        [
                            'name' => 'Dirty Louisiana',
                            'description' => 'Dirty Louisiana',
                            'price' => '299',
                        ],
                        [
                            'name' => 'Dirty Louisiana - Hot \'N\' Spicy',
                            'description' => 'Dirty Louisiana - Hot \'N\' Spicy',
                            'price' => '299',
                        ],
                    ],
                    'BURGER MENU' => [
                        [
                            'name' => 'Cheeseburger Menu',
                            'description' => 'Cheeseburger + Medium Fries + 0,33l Drink (Coca Cola, Coca Cola Zero, Fanta, Sprite)',
                            'price' => '259',
                        ],
                        [
                            'name' => 'Sanders Burger Menu',
                            'description' => 'Sanders Burger + Medium Fries + 0,33l Drink (Coca Cola, Coca Cola Zero, Fanta, Sprite)',
                            'price' => '299',
                        ],
                        [
                            'name' => 'Fillet Burger Menu',
                            'description' => 'Fillet Burger + Medium Fries + 0,33l Drink (Coca Cola, Coca Cola Zero, Fanta, Sprite)',
                            'price' => '319',
                        ],
                        [
                            'name' => 'Fillet Burger Menu - Hot \'N\' Spicy',
                            'description' => 'Fillet Burger - Hot \'N\' Spicy + Medium Fries + 0,33l Drink (Coca Cola, Coca Cola Zero, Fanta, Sprite)',
                            'price' => '319',
                        ],
                        [
                            'name' => 'Tower Burger Menu',
                            'description' => 'Tower Burger + Medium Fries + 0,33l Drink (Coca Cola, Coca Cola Zero, Fanta, Sprite)',
                            'price' => '389',
                        ],
                        [
                            'name' => 'Tower Burger Menu - Hot \'N\' Spicy',
                            'description' => 'Tower Burger - Hot \'N\' Spicy + Medium Fries + 0,33l Drink (Coca Cola, Coca Cola Zero, Fanta, Sprite)',
                            'price' => '389',
                        ],
                        [
                            'name' => 'Double Cheeseburger Menu',
                            'description' => 'Double Cheeseburger + Medium Fries + 0,33l Drink (Coca Cola, Coca Cola Zero, Fanta, Sprite)',
                            'price' => '319',
                        ],
                        [
                            'name' => 'Dirty Louisiana Menu',
                            'description' => 'Dirty Louisiana + Medium Fries + 0,33l Drink (Coca Cola, Coca Cola Zero, Fanta, Sprite)',
                            'price' => '419',
                        ],
                        [
                            'name' => 'Dirty Louisiana Menu - Hot \'N\' Spicy',
                            'description' => 'Dirty Louisiana - Hot \'N\' Spicy + Medium Fries + 0,33l Drink (Coca Cola, Coca Cola Zero, Fanta, Sprite)',
                            'price' => '419',
                        ],
                    ],
                    'Wraps' => [
                        [
                            'name' => 'Twister',
                            'description' => 'Twister',
                            'price' => '199',
                        ],
                        [
                            'name' => 'Twister - Hot \'N\' Spicy',
                            'description' => 'Twister - Hot \'N\' Spicy',
                            'price' => '199',
                        ],
                        [
                            'name' => 'Boxmaster',
                            'description' => 'Boxmaster',
                            'price' => '269',
                        ],
                        [
                            'name' => 'Boxmaster - Hot \'N\' Spicy',
                            'description' => 'Boxmaster - Hot \'N\' Spicy',
                            'price' => '269',
                        ],
                    ],
                ]
                ]
            ],
            [
                'name' => 'DOMINO`S PIZZA CENTAR',
                'address' => 'Dimitrie Cupovski 26, Skopje 1000',
                'available_people' => 20,
                'lat' => 41.9956279,
                'lng' => 21.4231058,
                'description' => 'Domino`s Pizza is located in Skopje. Domino`s Pizza is working in Fast food restaurants activities. You can find more information about Domino`s Pizza at www.dominos.com.',
                'image' => 'https://conceptstore.co.uk/wp-content/uploads/2015/04/dominos-logo1.jpg',
                'menus' => [ 'categories' => [
                                'CLASSIC PIZZAS' => [
                                    [
                                        'name' => 'Capricciosa pizza',
                                        'description' => 'доматен сос, моцарела, шунка, свежи печурки',
                                        'price' => '350',
                                    ],
                                    [
                                        'name' => 'Margarita pizza',
                                        'description' => 'доматен сос, двојна доза моцарела, оригано',
                                        'price' => '350',
                                    ],
                                    [
                                        'name' => 'Mediterranean pizza',
                                        'description' => 'доматен сос, моцарела, фета сирење, свежи домати, свежи пиперки, маслинки',
                                        'price' => '350',
                                    ],
                                    [
                                        'name' => 'Veggie pizza',
                                        'description' => 'доматен сос, растителен/посен кашкавал, свежи пиперки, свежи печурки, свежи домати, маслинки',
                                        'price' => '350',
                                    ],
                                ],
                                // FAVORITES PIZZAS
                                    // American Hot pizza
                                    // доматен сос, моцарела, domino`s пеперони колбас, јалапенос лути пиперк...
                                    // 370 ден.
                                    // Cheddar Melt pizza
                                    // доматен сос, моцарела, двојна доза на чедар кашкавал, двојна доза на с...
                                    // 370 ден.
                                    // Domino`s Special pizza
                                    // доматен сос, моцарела, шунка, сланина, кромид, свежи пиперки, свежи пе...
                                    // 370 ден.
                                    // Garlic Fredo pizza
                                    // свежа павлака, моцарела, спанаќ, печурки, сланина, гарлик сос
                                    // 370 ден.
                                    // Garlic Sizzler pizza
                                    // доматен сос, моцарела, пеперони, халапенос лути пиперки, маслинки, гар...
                                    // 370 ден.
                                    // Italian Passion pizza
                                    // доматен сос, моцарела, песто сос, пармезан, свежи домати и босилок
                                    // 370 ден.
                                    // Macedonian pizza
                                    // доматен сос, моцарела, лук, кромид, свежи пиперки, фета сирење, маслин...
                                    // 370 ден.
                                    // Parmesana pizza
                                    // свежа павлака, моцарела, пармезан, свежи домати, босилок
                                    // 370 ден.
                                    // PREMIUM PIZZAS
                                    // 4 Cheese pizza
                                    // доматен сос, моцарела, чедар, пармезан, фета
                                    // 400 ден.
                                    // Alfredo pizza
                                    // свежа павлака, моцарела, пармезан, пилешко месо и спанаќ
                                    // 400 ден.
                                    // Burger Barbeque pizza
                                    // барбекју сос, моцарела, кромид, домати, пилешко месо и бургер сос
                                    // 400 ден.
                                    // Burger pizza
                                    // 100% моцарела сирење, чедар кашкавал, зачинето телешко, свежи домати, ...
                                    // 400 ден.
                                    // Carbonara pizza
                                    // свежа павлака, пармезан, моцарела, сланина, печурки
                                    // 400 ден.
                                    // Ham&Bacon pizza
                                    // доматен сос, моцарела, чедар кашкавал, шунка, сланина
                                    // 400 ден.
                                    // New Yorker pizza
                                    // доматен сос, моцарела, domino`s пеперони колбас, сланина, печурки
                                    // 400 ден.
                                    // Pepperoni Passion pizza
                                    // доматен сос, двојна доза моцарела, двојна доза Domino`s пеперони колба...
                                    // 400 ден.
                                'FAVORITES PIZZAS' => [
                                    [
                                        
                                    ]
                                ]

                ]]
            ],
            [
                'name' => 'SUBZY',
                'address' => 'Dane Krapchev 27, Skopje 1000',
                'available_people' => 20,
                'lat' => 42.0009229,
                'lng' => 21.4136577,
                'description' => 'Subzy is located in Skopje. Subzy is working in Fast food restaurants activities. You can find more information about Subzy at www.subzy.com.',
                'image' => 'https://www.kliknijadi.mk/Images/Products/230_110121135737836_400x400.jpg',
                'menus' => [ 'categories' => [
                    'ПОЈАДОК ВРАПОВИ ( СО ОМЛЕТ ОД ДВЕ ЈАЈЦА )' => [
                        [
                            'name' => 'Омлет од две јајца со зеленчуци',
                            'price' => '130',
                        ],
                        [
                            'name' => 'Омлет од две јајца со павлака и печурки',
                            'price' => '150',
                        ],
                        [
                            'name' => 'Омлет од две јајца со фета и маслинки',
                            'price' => '160',
                        ],
                        [
                            'name' => 'Омлет од две јајца со шунка и кашкавал',
                            'price' => '160',
                        ],
                        [
                            'name' => 'Омлет од две јајца со сланина и чедар',
                            'price' => '180',
                        ],
                        [
                            'name' => 'Омлет од две јајца со сланина и авокадо',
                            'price' => '180',
                        ],
                    ],
                    'САЛАТИ' => [
                        [
                            'name' => 'Healthy salad',
                            'price' => '120',
                        ],
                        [
                            'name' => 'Vege Chef',
                            'price' => '140',
                        ],
                        [
                            'name' => 'Tuna salad',
                            'price' => '160',
                        ],
                        [
                            'name' => 'Cesar salad',
                            'price' => '160',
                        ],
                        [
                            'name' => 'Sexy salad',
                            'price' => '160',
                        ],
                        [
                            'name' => 'Tasty salad',
                            'price' => '160',
                        ],
                        [
                            'name' => 'Prosciutto salad',
                            'price' => '160',
                        ],
                        [
                            'name' => 'Салата Мексикана',
                            'price' => '130',
                        ],
                        [
                            'name' => 'Криспи Цезар',
                            'price' => '160',
                        ],
                    ],
                    'СЕНДВИЧИ И ВРАПОВИ' => [
                        [
                            'name' => 'Бел багет ладен',
                            'price' => '60',
                        ],
                        [
                            'name' => 'Бел багет потпечен',
                            'price' => '60',
                        ],
                        [
                            'name' => 'Бел багет тостиран',
                            'price' => '60',
                        ],
                        [
                            'name' => 'Интегрален багет ладен',
                            'price' => '60',
                        ],
                        [
                            'name' => 'Интегрален багет потпечен',
                            'price' => '60',
                        ],
                        [
                            'name' => 'Интегрален багет тостиран',
                            'price' => '60',
                        ],
                        [
                            'name' => 'Тортиља',
                            'price' => '60',
                        ],
                        [
                            'name' => 'Багет со италијански зачини',
                            'price' => '60',
                        ],
                    ],
                ]]
            ],
        ];

        foreach ($realRestaurantData as $restaurantData) {
            // Generate the user
            $user = User::create([
                'name' => $restaurantData['name'],
                'email' => strtolower(str_replace(' ', '', $restaurantData['name'])) . '@info.com',
                'password' => bcrypt('password'),
                'role' => 'owner',
            ]);

            // Generate the restaurant using real restaurant data
            $restaurant = Restaurant::create([
                'title' => $restaurantData['name'],
                'address' => $restaurantData['address'],
                'available_people' => $restaurantData['available_people'],
                'lat' => $restaurantData['lat'],
                'lng' => $restaurantData['lng'],
                'description' => $restaurantData['description'],
                'user_id' => $user->id,
                'rating' => rand(1, 5),
                'recomended' => rand(0, 1),
            ]);

            // Generate working hours for the restaurant
            $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
            foreach ($daysOfWeek as $day) {
                WorkingHour::create([
                    'restaurant_id' => $restaurant->id,
                    'day_of_week' => $day,
                    'opening_time' => '08:00',
                    'closing_time' => '18:00',
                ]);
            }

            // Generate a restaurant image
            RestaurantImage::create([
                'restaurant_id' => $restaurant->id,
                'image_url' => $restaurantData['image'],
                'display_order' => 1,
            ]);

            Image::create([
                'restaurant_id' => $restaurant->id,
                'image_url' => $restaurantData['image'],
            ]);
            if (isset($restaurantData['menus']) && is_array($restaurantData['menus'])) {
                foreach ($restaurantData['menus'] as $menuName => $categories) {
                    $menu = Menu::create([
                        'title' => $menuName,
                        'restaurant_id' => $restaurant->id,
                    ]);
        
                    foreach ($categories as $categoryName => $products) {
                        $category = Category::create([
                            'name' => $categoryName,
                            'menu_id' => $menu->id,
                        ]);
        
                        foreach ($products as $product) {
                            Product::create([
                                'name' => $product['name'],
                                'price' => $product['price'],
                                'category_id' => $category->id,
                            ]);
                        }
                    }
                }
            }
        }
    }
}