<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => 'Chicken and Rice',
            'body' => ' 4 quarts (16 cups) water approx. (enough to cover chicken)
            4 lb. (approx.) whole chicken
            3-4 stalks celery; rough chopped
            1 large sweet onion; diced
            1 teaspoon pepper – divided
            1 teaspoon salt – divided
            1/2 teaspoon oregano
            1/2 teaspoon celery salt
            1 1/2 teaspoons parsley – divided
            3 cups long grain white rice',
            'user_id' => 1,
            'cover_image' => 'https://shewearsmanyhats.com/wp-content/uploads/2019/01/classic-beef-bolognese-sauce-recipe-3.jpg'
        ],[
            'title' => 'BOLOGNESE SAUCE',
            'body' => ' 4 tablespoons butter
            1 tablespoon olive oil
            1 cup finely chopped/diced onion
            ⅔ cup finely chopped/diced celery
            ⅔ cup finely chopped/diced carrot
            1/4 teaspoon salt
            1/4 teaspoon ground black pepper
            4 garlic cloves, grated or finely minced
            4 ounces pancetta, prosciutto or bacon, diced/chopped
            1 pound ground beef chuck
            1 cup whole milk
            1 cup dry white wine
            1 tablespoon dried oregano
            1/8 teaspoon grated nutmeg
            1 bay leaf
            28 ounces (about 3 1/2 cups) quality canned whole plum tomatoes, with their juice
            additional salt and pepper to taste
            1 1/2-2 pounds pasta
            grated parmigiano-reggiano for garnish
            optional: fresh parsley and/or basil for garnish',
            'user_id' => 2,
            'cover_image' => 'https://shewearsmanyhats.com/wp-content/uploads/2019/01/classic-beef-bolognese-sauce-recipe-3.jpg'
        ],[
            'title' => 'GUINNESS BEEF STEW',
            'body' => ' 3 tablespoons olive oil
            2 medium onions, rough chopped
            2 celery sticks, rough chopped
            2 medium carrots, rough chopped
            2 bay leaves
            1/2 teaspoon dried sage (or thyme)
            1 pound stew beef, cubed into 1-inch pieces (chuck or bottom round works great)
            2 tablespoons all-purpose flour
            16 ounces ale, Guinness or stout
            14-15 ounces canned diced tomatoes
            2 teaspoons brown sugar
            1 teaspoon salt
            1 teaspoon ground black pepper',
            'user_id' => 3,
            'cover_image' => 'https://shewearsmanyhats.com/wp-content/uploads/2015/02/guinness-beef-stew-2.jpg'
        ]);
    }
}
