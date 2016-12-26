<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use \App\User;
use Illuminate\Support\Facades\Hash;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('projects')->truncate();
        DB::table('plans')->truncate();
        DB::table('catalogs')->truncate();
        DB::table('categories')->truncate();
        DB::table('products')->truncate();
        DB::table('permission_role')->truncate();
        DB::table('role_user')->truncate();
        DB::table('permissions')->truncate();
        DB::table('roles')->truncate();
        DB::table('users')->truncate();

        // Creating User Roles
        $sa = new \App\Role();
        $sa->name = "sa";
        $sa->display_name = "System Administrator";
        $sa->description = "System Administrator";
        $sa->save();

        $consultant = new \App\Role();
        $consultant->name = "consultant";
        $consultant->display_name = "Consultant";
        $consultant->description = "Consultant";
        $consultant->save();

        $consultant = new \App\Role();
        $consultant->name = "client";
        $consultant->display_name = "Client";
        $consultant->description = "Client";
        $consultant->save();
/*
        $msl = new \App\Role();
        $msl->name = "msl";
        $msl->display_name = "Master Software Licensee ( MSL )";
        $msl->description = "Master Software Licensee ( MSL )";
        $msl->save();

        $lm = new \App\Role();
        $lm->name = "lm";
        $lm->display_name = "Licensee's Merchant";
        $lm->description = "Licensee's Merchant";
        $lm->save();

        $ec = new \App\Role();
        $ec->name = "ec";
        $ec->display_name = "Licensee's End Customer";
        $ec->description = "Licensee's End Customer";
        $ec->save();
*/
        // Creating Application Permissions
        $new_projects = new \App\Permission();
        $new_projects->name = "create-projects";
        $new_projects->display_name = "create-projects";
        $new_projects->description = "create-projects";
        $new_projects->save();

        $new_products = new \App\Permission();
        $new_products->name = "create-products";
        $new_products->display_name = "create-products";
        $new_products->description = "create-products";
        $new_products->save();

        $new_plans = new \App\Permission();
        $new_plans->name = "create-plans";
        $new_plans->display_name = "create-plans";
        $new_plans->description = "create-plans";
        $new_plans->save();

        $new_plans = new \App\Permission();
        $new_plans->name = "create-catalogs";
        $new_plans->display_name = "create-catalogs";
        $new_plans->description = "create-catalogs";
        $new_plans->save();

        $new_plans = new \App\Permission();
        $new_plans->name = "create-categories";
        $new_plans->display_name = "create-categories";
        $new_plans->description = "create-categories";
        $new_plans->save();

        $new_plans = new \App\Permission();
        $new_plans->name = "create-schedules";
        $new_plans->display_name = "create-schedules";
        $new_plans->description = "create-schedules";
        $new_plans->save();


        // update permissions

        $update_projects = new \App\Permission();
        $update_projects->name = "update-projects";
        $update_projects->display_name = "update-projects";
        $update_projects->description = "update-projects";
        $update_projects->save();

        $update_products = new \App\Permission();
        $update_products->name = "update-products";
        $update_products->display_name = "update-products";
        $update_products->description = "update-products";
        $update_products->save();

        $update_plans = new \App\Permission();
        $update_plans->name = "update-plans";
        $update_plans->display_name = "update-plans";
        $update_plans->description = "update-plans";
        $update_plans->save();

        $update_plans = new \App\Permission();
        $update_plans->name = "update-catalogs";
        $update_plans->display_name = "update-catalogs";
        $update_plans->description = "update-catalogs";
        $update_plans->save();

        $update_plans = new \App\Permission();
        $update_plans->name = "update-categories";
        $update_plans->display_name = "update-categories";
        $update_plans->description = "update-categories";
        $update_plans->save();

        $update_plans = new \App\Permission();
        $update_plans->name = "update-schedules";
        $update_plans->display_name = "update-schedules";
        $update_plans->description = "update-schedules";
        $update_plans->save();

        // Delete permissions

        $delete_projects = new \App\Permission();
        $delete_projects->name = "delete-projects";
        $delete_projects->display_name = "delete-projects";
        $delete_projects->description = "delete-projects";
        $delete_projects->save();

        $delete_products = new \App\Permission();
        $delete_products->name = "delete-products";
        $delete_products->display_name = "delete-products";
        $delete_products->description = "delete-products";
        $delete_products->save();

        $delete_plans = new \App\Permission();
        $delete_plans->name = "delete-plans";
        $delete_plans->display_name = "delete-plans";
        $delete_plans->description = "delete-plans";
        $delete_plans->save();

        $delete_plans = new \App\Permission();
        $delete_plans->name = "delete-catalogs";
        $delete_plans->display_name = "delete-catalogs";
        $delete_plans->description = "delete-catalogs";
        $delete_plans->save();

        $delete_plans = new \App\Permission();
        $delete_plans->name = "delete-categories";
        $delete_plans->display_name = "delete-categories";
        $delete_plans->description = "delete-categories";
        $delete_plans->save();

        $delete_plans = new \App\Permission();
        $delete_plans->name = "delete-schedules";
        $delete_plans->display_name = "delete-schedules";
        $delete_plans->description = "delete-schedules";
        $delete_plans->save();

        // View permissions

        $view_projects = new \App\Permission();
        $view_projects->name = "view-projects";
        $view_projects->display_name = "view-projects";
        $view_projects->description = "view-projects";
        $view_projects->save();

        $view_products = new \App\Permission();
        $view_products->name = "view-products";
        $view_products->display_name = "view-products";
        $view_products->description = "view-products";
        $view_products->save();

        $view_plans = new \App\Permission();
        $view_plans->name = "view-plans";
        $view_plans->display_name = "view-plans";
        $view_plans->description = "view-plans";
        $view_plans->save();

        $view_plans = new \App\Permission();
        $view_plans->name = "view-catalogs";
        $view_plans->display_name = "view-catalogs";
        $view_plans->description = "view-catalogs";
        $view_plans->save();

        $view_plans = new \App\Permission();
        $view_plans->name = "view-categories";
        $view_plans->display_name = "view-categories";
        $view_plans->description = "view-categories";
        $view_plans->save();

        $view_plans = new \App\Permission();
        $view_plans->name = "view-schedules";
        $view_plans->display_name = "view-schedules";
        $view_plans->description = "view-schedules";
        $view_plans->save();


        DB::table('permission_role')->insert(
            [['permission_id' => 1,'role_id' => 1],
            ['permission_id' => 2,'role_id' => 1],
            ['permission_id' => 3,'role_id' => 1],
            ['permission_id' => 4,'role_id' => 1],
            ['permission_id' => 5,'role_id' => 1],
            ['permission_id' => 6,'role_id' => 1],
            ['permission_id' => 7,'role_id' => 1],
            ['permission_id' => 8,'role_id' => 1],
            ['permission_id' => 9,'role_id' => 1],
            ['permission_id' => 10,'role_id' => 1],
            ['permission_id' => 11,'role_id' => 1],
            ['permission_id' => 12,'role_id' => 1],
            ['permission_id' => 13,'role_id' => 1],
            ['permission_id' => 14,'role_id' => 1],
            ['permission_id' => 15,'role_id' => 1],
            ['permission_id' => 16,'role_id' => 1],
            ['permission_id' => 17,'role_id' => 1],
            ['permission_id' => 18,'role_id' => 1],
            ['permission_id' => 19,'role_id' => 1],
            ['permission_id' => 20,'role_id' => 1],
            ['permission_id' => 21,'role_id' => 1],
            ['permission_id' => 22,'role_id' => 1],
            ['permission_id' => 23,'role_id' => 1],
            ['permission_id' => 24,'role_id' => 1],
            ['permission_id' => 25,'role_id' => 1],
            ['permission_id' => 26,'role_id' => 1]]
        );

        $user = new User();
        $user->first_name = "Seebo" ;
        $user->last_name = "Administrator";
        $user->email = "admin@seebo.com.au";
        $user->mobile = "1231231231";
        $user->password = Hash::make('123');
        $user->profile_pic = '/uploads/profile_pics/default.jpg';
        $user->save();

        $user = new User();
        $user->first_name = "Seebo" ;
        $user->last_name = "Consultant";
        $user->email = "con@seebo.com.au";
        $user->mobile = "1231231231";
        $user->password = Hash::make('123');
        $user->profile_pic = '/uploads/profile_pics/default.jpg';
        $user->save();



        DB::table('role_user')->insert([
            'user_id' => 1,
            'role_id' => 1
        ]);
        DB::table('role_user')->insert([
            'user_id' => 2,
            'role_id' => 2
        ]);


        DB::table('catalogs')->insert(['name' => 'Electrical','description' => 'Electrical description']);
        DB::table('catalogs')->insert(['name' => 'Home Automation','description' => 'Home Automation description']);
        DB::table('catalogs')->insert(['name' => 'Interior Design','description' => 'Interior Design description']);
        DB::table('catalogs')->insert(['name' => 'Fittings and Fixtures','description' => 'Fittings and Fixtures description']);


        DB::table('categories')->insert(['name' => 'Air conditioning','description' => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Air ioniser','description' => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Appliance plug','description' => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Aroma lamp','description' => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Light','description' => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Attic fan','description' => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Bachelor griller','description' => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Back boiler','description' => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Beverage opener','description' => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Box mangle','description' => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Can opener','description' => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Ceiling fan','description' => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Central vacuum cleaner','description'  => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Combo washer dryer' ,'description' => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Dish draining closet','description'  => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Dishwasher','description'  => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Domestic robot' ,'description' => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Comparison of domestic robots','description'  => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Drawer dishwasher','description'  => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Electric water boiler','description'  => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Fan heater','description'  => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Flame supervision device','description'  => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Forced-air' ,'description' => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Futon dryer' ,'description' => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Garbage disposal unit','description'  => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Gas appliance','description'  => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Go-to-bed matchbox','description'  => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Hair dryer','description'  => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Hair iron' ,'description' => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Hob (hearth)' ,'description' => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Humidifier' ,'description' => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'HVAC','description'  => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Icebox' ,'description' => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Internet refrigerator' ,'description' => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Clothes iron','description'  => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Kimatsu','description'  => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Kimchi refrigerator' ,'description' => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Mangle (machine)','description'  => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Manual vacuum cleaner','description'  => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Micathermic heater','description'  => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Microwave oven' ,'description' => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Mousetrap' ,'description' => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Oil heater' ,'description' => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Oven' ,'description' => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Patio heater','description'  => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Radiator (heating)','description'  => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Refrigerator','description'  => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Home server','description'  => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Sewing machine','description'  => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Stove' ,'description' => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Sump pump','description'  => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Thermal mass refrigerator' ,'description' => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Tie press' ,'description' => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Toaster and toaster ovens' ,'description' => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Trouser press','description'  => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Vacuum cleaner','description'  => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Robotic vacuum cleaner' ,'description' => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Washing machine','description'  => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Thor washing machine' ,'description' => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Water cooker' ,'description' => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Water heating','description'  => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Window fan','description'  => 'Electrical description','catalog_id' => 1]);
        DB::table('categories')->insert(['name' => 'Television' ,'description' => 'Electrical description','catalog_id' => 1]);
        
        DB::table('sub_categories')->insert(['name' => 'INCANDESCENT' ,'description' => 'INCANDESCENT description','category_id' => 5]);
        DB::table('sub_categories')->insert(['name' => 'FLUORESCENT' ,'description' => 'FLUORESCENT description','category_id' => 5]);
        DB::table('sub_categories')->insert(['name' => 'HIGH-INTENSITY DISCHARGE' ,'description' => 'HIGH-INTENSITY DISCHARGE description','category_id' => 5]);
        DB::table('sub_categories')->insert(['name' => 'LED','description'  => 'LED description','category_id' => 5]);




        for ($i=1;$i<=25;$i++){
            $is_composite = $faker->boolean(50);
            DB::table('products')->insert([
                'name' => 'Name for Product '.$i,
                'description' => 'Description for Product '.$i,
                'builder_code' => $faker->text(10),
                'pronto_code' => $faker->text(10),
                'manufacturing_product_code' => $faker->text(10),
                'image' => $faker->imageUrl(640,480,null,true,null),
                'builders_price' => $faker->numberBetween(0,10000),
                'discount' => $faker->numberBetween(0,100),
                'symbol' => $faker->numberBetween(0,100),
                'sales_price' => $faker->numberBetween(0,10000),
                'is_composite' => $is_composite
            ]);

            if($is_composite){
                for ($j=1;$j<=5;$j++) {
                    DB::table('composite_product_maps')->insert([
                        'parent' => $i,
                        'child' => $faker->numberBetween(1, 20)
                    ]);
                }
            }

            DB::table('sub_category_products')->insert(['sub_category_id' => 4 ,'product_id' => $i]);
        }

        for ($i=1;$i<=10;$i++){
            $id = DB::table('sub_categories')->insertGetId(['name' => 'Pack '.$i ,'description' => 'Pack description'.$i,'category_id' => 5,'is_pack' => true]);

            for ($j=1;$j<=5;$j++) {
                DB::table('sub_category_products')->insert(['sub_category_id' => $id, 'product_id' => $j]);
            }
        }


        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        DB::table('custom_field_types')->insert([
            ['name' => 'text'],
            ['name' => 'textarea'],
            ['name' => 'select'],
            ['name' => 'radio'],
            ['name' => 'checkbox']
        ]);

        DB::table('custom_field_sub_categories')->insert([
            ['name' => 'Energy Consumption (W)','custom_field_type_id' => 1,'is_mandatory' => true,'sub_category_id' => 4],
            ['name' => 'Width','custom_field_type_id' => 1,'is_mandatory' => true,'sub_category_id' => 4],
            ['name' => 'Height','custom_field_type_id' => 1,'is_mandatory' => true,'sub_category_id' => 4],
            ['name' => 'Depth','custom_field_type_id' => 1,'is_mandatory' => true,'sub_category_id' => 4],
        ]);

        DB::table('custom_field_sub_category_options')->insert([
            ['custom_field_sub_category_id' => 13,'name' => 'Sony'],
            ['custom_field_sub_category_id' => 13,'name' => 'Philips'],
            ['custom_field_sub_category_id' => 13,'name' => 'Panasonic'],
            ['custom_field_sub_category_id' => 14,'name' => 'Down Light'],
            ['custom_field_sub_category_id' => 14,'name' => 'Flood Light'],
            ['custom_field_sub_category_id' => 14,'name' => 'Spot Light'],
        ]);



        DB::table('product_symbols')->insert(['path' =>'/img/symbols/AMP.png', 'name' =>'AMP','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/AUT-001.png', 'name' =>'AUT-001','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/AUT-002.png', 'name' =>'AUT-002','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/AUT-003.png', 'name' =>'AUT-003','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/AUT-004.png', 'name' =>'AUT-004','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/AUT-005.png', 'name' =>'AUT-005','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/AUT-006.png', 'name' =>'AUT-006','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/AUT-007.png', 'name' =>'AUT-007','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/AUT-008.png', 'name' =>'AUT-008','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/AUT-009.png', 'name' =>'AUT-009','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/AUT-010.png', 'name' =>'AUT-010','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/AUT-011.png', 'name' =>'AUT-011','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/AUT-012.png', 'name' =>'AUT-012','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/AUT-031.png', 'name' =>'AUT-031','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/AUT-032.png', 'name' =>'AUT-032','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/AUT-033.png', 'name' =>'AUT-033','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/AUT-034.png', 'name' =>'AUT-034','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/AUT-036.png', 'name' =>'AUT-036','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/AUT-037.png', 'name' =>'AUT-037','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/AUT-038.png', 'name' =>'AUT-038','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/AUT-039.png', 'name' =>'AUT-039','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/AVC-001.png', 'name' =>'AVC-001','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/AVC-002.png', 'name' =>'AVC-002','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/AVC-005.png', 'name' =>'AVC-005','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/AVC-006.png', 'name' =>'AVC-006','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/AVC-010.png', 'name' =>'AVC-010','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/AVC-011.png', 'name' =>'AVC-011','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/AVC-012.png', 'name' =>'AVC-012','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/AVC-013.png', 'name' =>'AVC-013','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/AVC-014.png', 'name' =>'AVC-014','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/AVC-015.png', 'name' =>'AVC-015','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/AVC-016.png', 'name' =>'AVC-016','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/AVC-017.png', 'name' =>'AVC-017','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/AVC-018.png', 'name' =>'AVC-018','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/C-BUS---DIM.png', 'name' =>'C-BUS---DIM','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/CCTV-005.png', 'name' =>'CCTV-005','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/CCTV-006.png', 'name' =>'CCTV-006','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/CCTV-007.png', 'name' =>'CCTV-007','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/CCTV-008.png', 'name' =>'CCTV-008','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/CCTV-009.png', 'name' =>'CCTV-009','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/CCTV-010.png', 'name' =>'CCTV-010','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/CCTV-011.png', 'name' =>'CCTV-011','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/CCTV-012.png', 'name' =>'CCTV-012','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/CCTV-013.png', 'name' =>'CCTV-013','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/CCTV-014.png', 'name' =>'CCTV-014','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/CCTV-015.png', 'name' =>'CCTV-015','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/CCTV-017.png', 'name' =>'CCTV-017','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/CCTV-018.png', 'name' =>'CCTV-018','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/CCTV-019.png', 'name' =>'CCTV-019','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/CCTV-020.png', 'name' =>'CCTV-020','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/CCTV-021.png', 'name' =>'CCTV-021','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/COAX.png', 'name' =>'COAX','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/DATA.png', 'name' =>'DATA','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/DOOR_STATION.png', 'name' =>'DOOR_STATION','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/DOUBLE_PPA.png', 'name' =>'DOUBLE_PPA','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/DOUBLE_PP.png', 'name' =>'DOUBLE_PP','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/EXTERNAL_SIREN.png', 'name' =>'EXTERNAL_SIREN','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/FIB-001.png', 'name' =>'FIB-001','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/FIB-002.png', 'name' =>'FIB-002','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/FIB-003.png', 'name' =>'FIB-003','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/FIB-005.png', 'name' =>'FIB-005','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/FIB-006.png', 'name' =>'FIB-006','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/FIB-007.png', 'name' =>'FIB-007','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/FIB-008.png', 'name' =>'FIB-008','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/FIB-009.png', 'name' =>'FIB-009','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/FIB-010.png', 'name' =>'FIB-010','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/FIB-011.png', 'name' =>'FIB-011','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/FIB-012.png', 'name' =>'FIB-012','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/FIB-013.png', 'name' =>'FIB-013','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/GPIO.png', 'name' =>'GPIO','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/HDMI_EXTENDER.png', 'name' =>'HDMI_EXTENDER','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/HDMI-RX.png', 'name' =>'HDMI-RX','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/HN-001.png', 'name' =>'HN-001','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/HN-002.png', 'name' =>'HN-002','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/HN-003.png', 'name' =>'HN-003','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/HN-004.png', 'name' =>'HN-004','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/HN-005.png', 'name' =>'HN-005','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/HN-006.png', 'name' =>'HN-006','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/HN-007.png', 'name' =>'HN-007','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/HN-008.png', 'name' =>'HN-008','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/HN-009.png', 'name' =>'HN-009','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/HN-010.png', 'name' =>'HN-010','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/HN-012.png', 'name' =>'HN-012','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/HN-013.png', 'name' =>'HN-013','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/HN-014.png', 'name' =>'HN-014','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/HN-015.png', 'name' =>'HN-015','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/HN-016.png', 'name' =>'HN-016','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/HN-017.png', 'name' =>'HN-017','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/HN-018.png', 'name' =>'HN-018','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/HN-019.png', 'name' =>'HN-019','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/HN-020.png', 'name' =>'HN-020','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/HN-021.png', 'name' =>'HN-021','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/HN-022.png', 'name' =>'HN-022','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/HN-023.png', 'name' =>'HN-023','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/HN-024.png', 'name' =>'HN-024','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/HN-025-ZB.png', 'name' =>'HN-025-ZB','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/HN-025-ZW.png', 'name' =>'HN-025-ZW','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/HN-026-EB.png', 'name' =>'HN-026-EB','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/HN-026-OM.png', 'name' =>'HN-026-OM','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/HN-026-PW.png', 'name' =>'HN-026-PW','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/HN-027-HB.png', 'name' =>'HN-027-HB','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/HN-027-HS.png', 'name' =>'HN-027-HS','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/HN-028.png', 'name' =>'HN-028','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/HN-029.png', 'name' =>'HN-029','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/HN-030.png', 'name' =>'HN-030','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/HN-031.png', 'name' =>'HN-031','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/HTP-001.png', 'name' =>'HTP-001','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/HTP-002.png', 'name' =>'HTP-002','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/HTP-003.png', 'name' =>'HTP-003','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/HTP-004.png', 'name' =>'HTP-004','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/HTP-005.png', 'name' =>'HTP-005','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/HTP-006.png', 'name' =>'HTP-006','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/HTP-010.png', 'name' =>'HTP-010','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/INT-001.png', 'name' =>'INT-001','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/INT-002.png', 'name' =>'INT-002','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/INT-005-BK.png', 'name' =>'INT-005-BK','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/INT-005.png', 'name' =>'INT-005','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/INT-005-WH.png', 'name' =>'INT-005-WH','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/INT-006-BK.png', 'name' =>'INT-006-BK','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/INT-006.png', 'name' =>'INT-006','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/INT-006-WH.png', 'name' =>'INT-006-WH','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/INT-007.png', 'name' =>'INT-007','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/INT-008.png', 'name' =>'INT-008','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/INT-011.png', 'name' =>'INT-011','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/INTERCOM_PREWIRE.png', 'name' =>'INTERCOM_PREWIRE','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/INTERNAL_SIREN.png', 'name' =>'INTERNAL_SIREN','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/IR_EMITTER.png', 'name' =>'IR_EMITTER','category_id'=>1]);
        DB::table('product_symbols')->insert(['path' =>'/img/symbols/KEY_PAD.png', 'name' =>'KEY_PAD','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRD-001.png', 'name' =>'MRD-001','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRD-002.png', 'name' =>'MRD-002','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRD-003.png', 'name' =>'MRD-003','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRD-004.png', 'name' =>'MRD-004','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRD-005.png', 'name' =>'MRD-005','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRD-006.png', 'name' =>'MRD-006','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRD-007.png', 'name' =>'MRD-007','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRD-008.png', 'name' =>'MRD-008','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRD-009.png', 'name' =>'MRD-009','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRD-010.png', 'name' =>'MRD-010','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRD-011.png', 'name' =>'MRD-011','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRD-012.png', 'name' =>'MRD-012','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRD-013.png', 'name' =>'MRD-013','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRD-014.png', 'name' =>'MRD-014','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRD-015.png', 'name' =>'MRD-015','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRD-016.png', 'name' =>'MRD-016','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRD-017.png', 'name' =>'MRD-017','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRD-018.png', 'name' =>'MRD-018','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRD-019.png', 'name' =>'MRD-019','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRD-020.png', 'name' =>'MRD-020','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRD-021.png', 'name' =>'MRD-021','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRD-022.png', 'name' =>'MRD-022','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRD-023.png', 'name' =>'MRD-023','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRD-024.png', 'name' =>'MRD-024','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRMS-001-BK.png', 'name' =>'MRMS-001-BK','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRMS-001.png', 'name' =>'MRMS-001','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRMS-001-WH.png', 'name' =>'MRMS-001-WH','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRMS-002-BK.png', 'name' =>'MRMS-002-BK','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRMS-002.png', 'name' =>'MRMS-002','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRMS-002-WH.png', 'name' =>'MRMS-002-WH','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRMS-003-BK.png', 'name' =>'MRMS-003-BK','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRMS-003.png', 'name' =>'MRMS-003','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRMS-003-WH.png', 'name' =>'MRMS-003-WH','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRMS-004.png', 'name' =>'MRMS-004','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRMS-005.png', 'name' =>'MRMS-005','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRMS-006.png', 'name' =>'MRMS-006','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRMS-007.png', 'name' =>'MRMS-007','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRMS-008.png', 'name' =>'MRMS-008','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRMS-009.png', 'name' =>'MRMS-009','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRMS-010.png', 'name' =>'MRMS-010','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRMS-011.png', 'name' =>'MRMS-011','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRMS-012.png', 'name' =>'MRMS-012','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRMS-013.png', 'name' =>'MRMS-013','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRMS-014.png', 'name' =>'MRMS-014','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRMS-015.png', 'name' =>'MRMS-015','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRMS-016.png', 'name' =>'MRMS-016','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRMS-017.png', 'name' =>'MRMS-017','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRMS-018.png', 'name' =>'MRMS-018','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRMS-019.png', 'name' =>'MRMS-019','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/MRMS-020.png', 'name' =>'MRMS-020','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/NBN_PP.png', 'name' =>'NBN_PP','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/PANIC_BUTTON.png', 'name' =>'PANIC_BUTTON','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/PAY_TV_POINT.png', 'name' =>'PAY_TV_POINT','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/PHONE.png', 'name' =>'PHONE','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/PRO-011.png', 'name' =>'PRO-011','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/PRO-012.png', 'name' =>'PRO-012','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/PRO-021.png', 'name' =>'PRO-013','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/PRO-022.png', 'name' =>'PRO-014','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/PRO-023.png', 'name' =>'PRO-015','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/PRO-024.png', 'name' =>'PRO-016','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/REED_SWITCH.png', 'name' =>'REED_SWITCH','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/RELAY.png', 'name' =>'RELAY','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/RS232.png', 'name' =>'RS232','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-001.png', 'name' =>'SAE-001','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-002.png', 'name' =>'SAE-002','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-003.png', 'name' =>'SAE-003','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-004.png', 'name' =>'SAE-004','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-005.png', 'name' =>'SAE-005','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-006.png', 'name' =>'SAE-006','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-007.png', 'name' =>'SAE-007','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-008.png', 'name' =>'SAE-008','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-009.png', 'name' =>'SAE-009','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-010.png', 'name' =>'SAE-010','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-011.png', 'name' =>'SAE-011','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-012.png', 'name' =>'SAE-012','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-013.png', 'name' =>'SAE-013','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-014.png', 'name' =>'SAE-014','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-020.png', 'name' =>'SAE-020','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-021.png', 'name' =>'SAE-021','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-022.png', 'name' =>'SAE-022','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-023.png', 'name' =>'SAE-023','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-024.png', 'name' =>'SAE-024','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-028.png', 'name' =>'SAE-028','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-032.png', 'name' =>'SAE-032','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-033.png', 'name' =>'SAE-033','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-041.png', 'name' =>'SAE-041','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-051.png', 'name' =>'SAE-051','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-052.png', 'name' =>'SAE-052','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-053.png', 'name' =>'SAE-053','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-054.png', 'name' =>'SAE-054','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-055.png', 'name' =>'SAE-055','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-071.png', 'name' =>'SAE-071','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-072.png', 'name' =>'SAE-072','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-073.png', 'name' =>'SAE-073','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-074.png', 'name' =>'SAE-074','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-075.png', 'name' =>'SAE-075','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-076.png', 'name' =>'SAE-076','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-077.png', 'name' =>'SAE-077','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-078.png', 'name' =>'SAE-078','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-079.png', 'name' =>'SAE-079','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-080.png', 'name' =>'SAE-080','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-081.png', 'name' =>'SAE-081','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-082.png', 'name' =>'SAE-082','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-083.png', 'name' =>'SAE-083','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-084.png', 'name' =>'SAE-084','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-085.png', 'name' =>'SAE-085','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-086.png', 'name' =>'SAE-086','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-087.png', 'name' =>'SAE-087','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-088.png', 'name' =>'SAE-088','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-089.png', 'name' =>'SAE-089','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-090.png', 'name' =>'SAE-090','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-091.png', 'name' =>'SAE-091','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-092.png', 'name' =>'SAE-092','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-093.png', 'name' =>'SAE-093','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-094.png', 'name' =>'SAE-094','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-095-ZB.png', 'name' =>'SAE-095-ZB','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-095-ZW.png', 'name' =>'SAE-095-ZW','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-096-EB.png', 'name' =>'SAE-096-EB','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-096-OM.png', 'name' =>'SAE-096-OM','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-096-PW.png', 'name' =>'SAE-096-PW','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-097-HB.png', 'name' =>'SAE-097-HB','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-097-HS.png', 'name' =>'SAE-097-HS','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-099.png', 'name' =>'SAE-099','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SAE-100.png', 'name' =>'SAE-100','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SENSOR.png', 'name' =>'SENSOR','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SMART_WIRED.png', 'name' =>'SMART_WIRED','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SMOKE_DETECTOR.png', 'name' =>'SMOKE_DETECTOR','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SPEAKER.png', 'name' =>'SPEAKER','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SPEAKER_PREWIRE.png', 'name' =>'SPEAKER_PREWIRE','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/STAR-001.png', 'name' =>'STAR-001','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/STAR-002.png', 'name' =>'STAR-002','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/STAR-003.png', 'name' =>'STAR-003','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/STAR-004.png', 'name' =>'STAR-004','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/STAR-005.png', 'name' =>'STAR-005','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/STAR-006.png', 'name' =>'STAR-006','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/STAR-007.png', 'name' =>'STAR-007','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/STAR-008.png', 'name' =>'STAR-008','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/STAR-009.png', 'name' =>'STAR-009','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/STAR-010.png', 'name' =>'STAR-010','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/SUBWOOFER.png', 'name' =>'SUBWOOFER','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/TRIM.png', 'name' =>'TRIM','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/TUX.png', 'name' =>'TUX','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/TV_POINT.png', 'name' =>'TV_POINT','category_id'=>1]);
DB::table('product_symbols')->insert(['path' =>'/img/symbols/WSC_PP.png', 'name' =>'WSC_PP','category_id'=>1]);

        for ($i=1;$i<=25;$i++){
            $id = DB::table('templates')->insertGetId(['name' => 'Template '.$i ,'energy_rating' => $faker->randomElement(['1','3','5','8']),'scale' => $faker->randomElement(['50','100','150','200']),'sqm_house' => $faker->numberBetween(10,100),'sqm_porch' => $faker->numberBetween(10,100),'sqm_garage' => $faker->numberBetween(10,100)]);

        }

    }
}
