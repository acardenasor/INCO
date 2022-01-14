<?php

namespace Database\Seeders;

use App\Models\Category;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        /*$category->id_category = 1;*/
        $category->name = 'Fashion bloggers';
        $category->description = 'Un “Fashion blogger” como su nombre lo dice, es un bloguero de moda. Persona que escribe, redacta y habla sobre temas relacionados específicamente de moda, belleza y estilo';
        $category->save();

        $category2 = new Category();
        /*$category2->id_category = 2;*/
        $category2->name = 'Foodies';
        $category2->description = ' son un tipo de influencer que expresan su pasión por la comida y el buen comer. Comparten recetas, tutoriales paso a paso sobre cómo realizar ciertos platillos, recomiendan restaurantes donde comer y motivan a sus seguidores a experimentar en la cocina.
        Estos influenciadores pueden ser chefs consagrados con años de experiencias como también aficionados a la gastronomía que desean crear comunidades locales.';
        $category2->save();

        $category3 = new Category();
        /*$category3->id_category = 3;*/
        $category3->name = 'gamers and technology gurus';
        $category3->description = 'Los influencers relacionados a los videojuegos son aquellos que se graban jugando, haciendo análisis de la calidad de los gráficos del juegos, de lo que les gusta, de la estrategias o trucos que ejecutan, entre otros.
        También, puedes encontrar youtubers que hacen vídeos de reviews sobre celulares. Allí suelen hablar de las ventajas que tienen algunos modelos por encima de otro y por qué deberías ciertas marcas en particular. ';
        $category3->save();

        $category4 = new Category();
        /*$category4->id_category = 4;*/
        $category4->name = 'Celebrities and artists';
        $category4->description = 'Youtube y las redes sociales han sido grandes plataformas para que las celebridades hagan crecer su alcance e influencia en las masas. Will Smith y su canal de YouTube es un ejemplo de cómo un actor consagrado y conocido mundialmente usa las mismas plataformas que los influenciadores para hacer crecer sus audiencias.
        Los grandes personajes del mundo cinematográfico también se consideran un tipo de influenciador en redes sociales, a quiénes las marcas más grandes del mercado, como Adidas, Nike, Pepsi, patrocinan. ';
        $category4->save();

        $category5 = new Category();
        /*$category5->id_category = 5;*/
        $category5->name = 'Fitness and healthy life';
        $category5->description = 'son aquellos que promueven la importancia de comer balanceado, comparten recetas saludables, rutinas de ejercicio, dietas, consejos, entre otros.';
        $category5->save();


    }
}
