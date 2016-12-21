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
        $user->profile_pic = 'profile_pic/1/seebo.png';
        $user->save();

        $user = new User();
        $user->first_name = "Seebo" ;
        $user->last_name = "Consultant";
        $user->email = "con@seebo.com.au";
        $user->mobile = "1231231231";
        $user->password = Hash::make('123');
        $user->profile_pic = 'profile_pic/1/seebo.png';
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
            DB::table('products')->insert([
                'name' => 'Name for Product '.$i,
                'description' => 'Description for Product '.$i,
                'builder_code' => $faker->text(10),
                'pronto_code' => $faker->text(10),
                'manufacturing_product_code' => $faker->text(10),
                'image' => $faker->imageUrl(640,480,null,true,null),
                'builders_price' => $faker->numberBetween(0,10000),
                'discount' => $faker->numberBetween(0,100),
                'sales_price' => $faker->numberBetween(0,10000),
                'is_composite' => $faker->boolean(50)
            ]);

            DB::table('sub_category_products')->insert(['sub_category_id' => 4 ,'product_id' => $i]);
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

    }
}
