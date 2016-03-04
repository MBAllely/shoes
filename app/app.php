<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Store.php";
    require_once __DIR__."/../src/Brand.php";

    $app = new Silex\Application();



    $app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views'
    ));

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    $server = 'mysql:host=localhost;dbname=shoes';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app->get("/", function() use ($app) {
        return $app['twig']->render('index.html.twig', array(
            // twig input associative array
        ));
    });

    $app->get("/stores", function() use ($app) {
        return $app['twig']->render('stores.html.twig', array(
            'stores' => Store::getAll()
        ));
    });

    $app->post("/stores", function() use ($app) {
        $new_store = new Store($_POST['store_name'], $_POST['phone']);
        $new_store->save();
        return $app['twig']->render('stores.html.twig', array(
            'stores' => Store::getAll()
        ));
    });

    $app->get("/store/{id}", function($id) use ($app) {
        $store = Store::find($id);
        return $app['twig']->render('store.html.twig', array(
            'store' => $store,
            'store_brands' => $store->getBrands(),
            'brands' => Brand::getAll()
        ));
    });

    $app->get("/store/{id}/edit", function($id) use ($app) {
        $store = Store::find($id);
        return $app['twig']->render('store_edit.html.twig', array(
            'store' => $store,
            'store_brands' => $store->getBrands(),
            'brands' => Brand::getAll()
        ));
    });

    $app->patch("/store/{id}", function($id) use ($app) {
        $store = Store::find($id);
        $store->update($_POST['new_store_name'], $_POST['new_phone']);
        return $app['twig']->render('store.html.twig', array(
            'store' => $store,
            'store_brands' => $store->getBrands(),
            'brands' => Brand::getAll()
        ));
    });

    $app->get("/brands", function() use ($app) {
        return $app['twig']->render('brands.html.twig', array(
            'brands' => Brand::getAll()
        ));
    });

    return $app;
?>
