<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;
use Zend\Expressive\Application;
use Zend\Expressive\MiddlewareFactory;

/**
 * Setup routes with a single request method:
 *
 * $app->get('/', App\Handler\HomePageHandler::class, 'home');
 * $app->post('/album', App\Handler\AlbumCreateHandler::class, 'album.create');
 * $app->put('/album/:id', App\Handler\AlbumUpdateHandler::class, 'album.put');
 * $app->patch('/album/:id', App\Handler\AlbumUpdateHandler::class, 'album.patch');
 * $app->delete('/album/:id', App\Handler\AlbumDeleteHandler::class, 'album.delete');
 *
 * Or with multiple request methods:
 *
 * $app->route('/contact', App\Handler\ContactHandler::class, ['GET', 'POST', ...], 'contact');
 *
 * Or handling all request methods:
 *
 * $app->route('/contact', App\Handler\ContactHandler::class)->setName('contact');
 *
 * or:
 *
 * $app->route(
 *     '/contact',
 *     App\Handler\ContactHandler::class,
 *     Zend\Expressive\Router\Route::HTTP_METHOD_ANY,
 *     'contact'
 * );
 */
return function (Application $app, MiddlewareFactory $factory, ContainerInterface $container) : void {
    // $app->get('/', App\Handler\HomePageHandler::class, 'home');
    $app->get('/', GallimimusSitesModule\Handler\SiteHandler::class, 'sites.home');
    $app->get('/api/ping[/]', App\Handler\PingHandler::class, 'api.ping');
    $app->get('/dupa/ping[/]', Dupa\Handler\PingHandler::class, 'dupa.ping');
    $app->get('/sites/ping[/]', GallimimusSitesModule\Handler\PingHandler::class, 'sites.ping');
    $app->get('/sites[/]', GallimimusSitesModule\Handler\SiteHandler::class, 'sites.site');
    $app->get('/repository/get/{slug}[/]', GallimimusRepositoryModule\Handler\Get::class, 'repository.get');
    $app->get('/repository/ping[/]', GallimimusRepositoryModule\Handler\PingHandler::class, 'repository.ping');
	$app->get('/files/ping[/]', GallimimusFilesModule\Handler\PingHandler::class, 'files.ping');
	$app->get('/img/{id}[/]', GallimimusFilesModule\Handler\FileHandler::class, 'files.file');
    $app->get('/{slug}[/]', GallimimusSitesModule\Handler\SiteHandler::class, 'sites.site');
};
