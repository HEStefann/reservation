<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Floor;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Restaurant;
use App\Models\WorkingHour;
use App\Models\RestaurantImage;
use App\Models\Image;
use App\Models\Menu;
use App\Models\Moderator;
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
                'menus' => [
                    'categories' => [
                        'Menu' => [
                            [
                                'name' => '6 KING NUGGETS MENU',
                                'description' => '6 KING NUGGETS MENU',
                                'price' => '355',
                            ],
                            [
                                'name' => '9 KING NUGGETS MENU',
                                'description' => '9 KING NUGGETS MENU',
                                'price' => '400',
                            ],
                            [
                                'name' => 'BIG KING MENU',
                                'description' => 'BIG KING MENU',
                                'price' => '440',
                            ],
                            [
                                'name' => 'BIG KING XXL MENU',
                                'description' => 'BIG KING XXL MENU',
                                'price' => '600',
                            ],
                            [
                                'name' => 'CHEESEBURGER MENU',
                                'description' => 'CHEESEBURGER MENU',
                                'price' => '300',
                            ],
                            [
                                'name' => 'CHICKEN BBQ DELUXE MENU',
                                'description' => 'CHICKEN BBQ DELUXE MENU',
                                'price' => '355',
                            ],
                            [
                                'name' => 'CHICKEN BURGER MENU',
                                'description' => 'CHICKEN BURGER MENU',
                                'price' => '295',
                            ],
                            [
                                'name' => 'CHICKEN ROYALE CHEESE MENU',
                                'description' => 'CHICKEN ROYALE CHEESE MENU',
                                'price' => '510',
                            ],
                            [
                                'name' => 'CHICKEN ROYALE MENU',
                                'description' => 'CHICKEN ROYALE MENU',
                                'price' => '480',
                            ],
                            [
                                'name' => 'CRISPY CHICKEN CHEESE MENU',
                                'description' => 'CRISPY CHICKEN CHEESE MENU',
                                'price' => '385',
                            ],
                            [
                                'name' => 'CRISPY CHICKEN MENU',
                                'description' => 'CRISPY CHICKEN MENU',
                                'price' => '370',
                            ],
                        ],

                        'KIDS MEAL' => [
                            [
                                'name' => 'KIDS CHEESEBURGER MENU + TOY',
                                'description' => 'KIDS CHEESEBURGER MENU + TOY',
                                'price' => '330',
                            ],
                            [
                                'name' => 'KIDS HAMBURGER MENU + TOY',
                                'description' => 'KIDS HAMBURGER MENU + TOY',
                                'price' => '315',
                            ],
                            [
                                'name' => 'KIDS CHICKENBURGER MENU + TOY',
                                'description' => 'KIDS CHICKENBURGER MENU + TOY',
                                'price' => '325',
                            ],
                            [
                                'name' => 'KIDS NUGGETS MENU + TOY',
                                'description' => 'KIDS NUGGETS MENU + TOY',
                                'price' => '315',
                            ],
                        ],

                        'BURGER' => [
                            [
                                'name' => 'BIG KING',
                                'description' => 'BIG KING',
                                'price' => '335',
                            ],
                            [
                                'name' => 'BIG KING XXL',
                                'description' => 'BIG KING XXL',
                                'price' => '410',
                            ],
                            [
                                'name' => 'CHEESEBURGER',
                                'description' => 'CHEESEBURGER',
                                'price' => '180',
                            ],
                            [
                                'name' => 'CHICKEN ROYALE',
                                'description' => 'CHICKEN ROYALE',
                                'price' => '330',
                            ],
                            [
                                'name' => 'CHICKEN ROYALE CHEESE',
                                'description' => 'CHICKEN ROYALE CHEESE',
                                'price' => '360',
                            ],
                            [
                                'name' => 'CHICKEN BBQ DELUXE',
                                'description' => 'CHICKEN BBQ DELUXE',
                                'price' => '220',
                            ],
                            [
                                'name' => 'CHICKEN BURGER',
                                'description' => 'CHICKEN BURGER',
                                'price' => '185',
                            ],
                            [
                                'name' => 'CRISPY CHICKEN',
                                'description' => 'CRISPY CHICKEN',
                                'price' => '230',
                            ],
                            [
                                'name' => 'CRISPY CHICKEN CHEESE',
                                'description' => 'CRISPY CHICKEN CHEESE',
                                'price' => '245',
                            ],
                            [
                                'name' => 'DOUBLE WHOPPER',
                                'description' => 'DOUBLE WHOPPER',
                                'price' => '420',
                            ],
                            [
                                'name' => 'DOUBLE WHOPPER CHEESE',
                                'description' => 'DOUBLE WHOPPER CHEESE',
                                'price' => '450',
                            ],
                        ]
                    ]
                ],
            ],
            [
                'name' => 'KFC',
                'address' => 'City Mall (Food Corner, Ljubljanska 4, Skopje 1000)',
                'available_people' => 230,
                'lat' => 42.0047741,
                'lng' => 21.3868903,
                'description' => 'KFC is located in Skopje. KFC is working in Fast food restaurants activities. You can find more information about KFC at www.kfc.com.',
                'image' => 'https://www.pngkit.com/png/detail/50-508776_kfc-logo.png',
                'menus' => [
                    'categories' => [
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
                ],
            ],
            [
                'name' => 'DOMINO`S PIZZA CENTAR',
                'address' => 'Dimitrie Cupovski 26, Skopje 1000',
                'available_people' => 20,
                'lat' => 41.9956279,
                'lng' => 21.4231058,
                'description' => 'Domino`s Pizza is located in Skopje. Domino`s Pizza is working in Fast food restaurants activities. You can find more information about Domino`s Pizza at www.dominos.com.',
                'image' => 'https://conceptstore.co.uk/wp-content/uploads/2015/04/dominos-logo1.jpg',
                'menus' => [
                    'categories' => [
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
                        'FAVORITES PIZZAS' => [
                            [
                                'name' => 'American Hot pizza',
                                'description' => 'доматен сос, моцарела, domino`s пеперони колбас, јалапенос лути пиперки, кромид',
                                'price' => '370'
                            ],
                            [
                                'name' => 'Cheddar Melt pizza',
                                // доматен сос, моцарела, двојна доза на чедар кашкавал, двојна доза на свежи печурки, двојна доза на сланина
                                'description' => 'доматен сос, моцарела, двојна доза на чедар кашкавал, двојна доза на свежи печурки, двојна доза на сланина',
                                'price' => '370',
                            ],
                            [
                                'name' => 'Domino`s Special pizza',
                                'description' => 'доматен сос, моцарела, шунка, сланина, кромид, свежи пиперки, свежи печурки',
                                'price' => '370',
                            ],
                            [
                                'name' => 'Garlic Fredo',
                                'description' => 'свежа павлака, моцарела, спанаќ, печурки, сланина, гарлик сос',
                                'price' => '370',
                            ]

                        ]
                    ],
                ]
            ],
            [
                'name' => 'SUBZY',
                'address' => 'Dane Krapchev 27, Skopje 1000',
                'available_people' => 20,
                'lat' => 42.0009229,
                'lng' => 21.4136577,
                'description' => 'Subzy is located in Skopje. Subzy is working in Fast food restaurants activities. You can find more information about Subzy at www.subzy.com.',
                'image' => 'https://www.kliknijadi.mk/Images/Products/230_110121135737836_400x400.jpg',
                'menus' => ['categories' => [
                    'ПОЈАДОК ВРАПОВИ ( СО ОМЛЕТ ОД ДВЕ ЈАЈЦА )' => [
                        [
                            'name' => 'Омлет од две јајца со зеленчуци',
                            'description' => 'Омлет од две јајца со зеленчуци',
                            'price' => '130',
                        ],
                        [
                            'name' => 'Омлет од две јајца со павлака и печурки',
                            'description' => 'Омлет од две јајца со павлака и печурки',
                            'price' => '150',
                        ],
                        [
                            'name' => 'Омлет од две јајца со фета и маслинки',
                            'description' => 'Омлет од две јајца со фета и маслинки',
                            'price' => '160',
                        ],
                        [
                            'name' => 'Омлет од две јајца со шунка и кашкавал',
                            'description' => 'Омлет од две јајца со шунка и кашкавал',
                            'price' => '160',
                        ],
                        [
                            'name' => 'Омлет од две јајца со сланина и чедар',
                            'description' => 'Омлет од две јајца со сланина и чедар',
                            'price' => '180',
                        ],
                        [
                            'name' => 'Омлет од две јајца со сланина и авокадо',
                            'description' => 'Омлет од две јајца со сланина и авокадо',
                            'price' => '180',
                        ],
                    ],
                    'САЛАТИ' => [
                        [
                            'name' => 'Healthy salad',
                            'description' => 'Healthy salad',
                            'price' => '120',
                        ],
                        [
                            'name' => 'Vege Chef',
                            'description' => 'Vege Chef',
                            'price' => '140',
                        ],
                        [
                            'name' => 'Tuna salad',
                            'description' => 'Tuna salad',
                            'price' => '160',
                        ],
                        [
                            'name' => 'Cesar salad',
                            'description' => 'Cesar salad',
                            'price' => '160',
                        ],
                        [
                            'name' => 'Sexy salad',
                            'description' => 'Sexy salad',
                            'price' => '160',
                        ],
                        [
                            'name' => 'Tasty salad',
                            'description' => 'Tasty salad',
                            'price' => '160',
                        ],
                        [
                            'name' => 'Prosciutto salad',
                            'description' => 'Prosciutto salad',
                            'price' => '160',
                        ],
                        [
                            'name' => 'Салата Мексикана',
                            'description' => 'Салата Мексикана',
                            'price' => '130',
                        ],
                        [
                            'name' => 'Криспи Цезар',
                            'description' => 'Криспи Цезар',
                            'price' => '160',
                        ],
                    ],
                    'СЕНДВИЧИ И ВРАПОВИ' => [
                        [
                            'name' => 'Бел багет ладен',
                            'description' => 'Бел багет ладен',
                            'price' => '60',
                        ],
                        [
                            'name' => 'Бел багет потпечен',
                            'description' => 'Бел багет потпечен',
                            'price' => '60',
                        ],
                        [
                            'name' => 'Бел багет тостиран',
                            'description' => 'Бел багет тостиран',
                            'price' => '60',
                        ],
                        [
                            'name' => 'Интегрален багет ладен',
                            'description' => 'Интегрален багет ладен',
                            'price' => '60',
                        ],
                        [
                            'name' => 'Интегрален багет потпечен',
                            'description' => 'Интегрален багет потпечен',
                            'price' => '60',
                        ],
                        [
                            'name' => 'Интегрален багет тостиран',
                            'description' => 'Интегрален багет тостиран',
                            'price' => '60',
                        ],
                        [
                            'name' => 'Тортиља',
                            'description' => 'Тортиља',
                            'price' => '60',
                        ],
                        [
                            'name' => 'Багет со италијански зачини',
                            'description' => 'Багет со италијански зачини',
                            'price' => '60',
                        ],
                    ],
                ]]
            ],
            [
                'name' => 'GYRO HOUSE',
                'address' => 'Blvd. Saint Clement of Ohrid BB, Skopje 1000',
                'available_people' => 20,
                'lat' => 41.9977984,
                'lng' => 21.1202439,
                'description' => 'Gyro House is a restaurant located in Skopje, Macedonia.',
                'image' => 'https://www.kliknijadi.mk/Images/Products/1651_131022165318545_400x400.jpg',
                'menus' => [
                    'categories' => [
                        'GYRO HOUSE' => [
                            [
                                'name' => 'Гиро порција пилешко',
                                'description' => 'Гиро порција пилешко',
                                'price' => '350',

                            ]
                        ]
                    ]
                ]
            ]
        ];

        foreach ($realRestaurantData as $restaurantData) {
            // Generate the user
            $user = User::create([
                'name' => $restaurantData['name'],
                'email' => strtolower(str_replace(' ', '', $restaurantData['name'])) . '@info.com',
                'password' => bcrypt('password'),
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
                'rating' => rand(3, 5),
                'recomended' => rand(0, 1),
            ]);
            Moderator::create([
                'user_id' => $user->id,
                'restaurant_id' => $restaurant->id,
                'role' => 'owner',
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
                                'description' => $product['description'],
                                'price' => $product['price'],
                                'category_id' => $category->id,
                            ]);
                        }
                    }
                }
            }
        }
        $restaurant = Restaurant::find(1);
        $floor = Floor::find(78);

        $restaurant->floors()->attach($floor);
        $floor2 = Floor::find(77);
        $restaurant->floors()->attach($floor2);
    }
}