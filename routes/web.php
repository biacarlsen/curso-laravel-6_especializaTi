<?php

Route::post('/register', function () {
    return '';
});
Route::get('/empresa', function () {
    return 'Sobre a empresa';
});
Route::get('/contato', function () {
    return view('site.contact');
});
Route::get('/', function () {
    return 'Hello, World!';
});
// permite todos os tipos de requisição/verbos http (put, get, post...) *não é mto seguro usar
Route::any('/any', function () {
    return 'Exemplo Any';
});
// permite as requisições q forem estipuladas
Route::match(['get', 'post'], '/match', function () {
    return 'Exemplo match';
});
// rota com parâmetros (valor dinâmico)
Route::get('/categorias/{cat}', function ($flag) {
    return "Produtos da categoria: {$flag}";
});
// rota com parâmetros (valor dinamico com prefixo)
Route::get('/categorias/{flag}/posts', function ($prm1) {
    return "Posts da categoria: {$prm1}";
});
// rota com parâmetro opcional usando um valor padrão pra quando nao tiver id, nesse caso.
Route::get('/produtos/{idProduct?}', function ($idProduct = '') {
    return "Produtos(s): {$idProduct}";
});
// rota com redirecionamento usando função helper redirect do laravel.
Route::redirect('/redirect1', '/redirect2');

// rota com redirecionamento.
Route::get('/redirect2', function () {
    return 'Olá, mundinho!';
});
// rota com redirecionamento pra uma view simples sem precisar passar pelo controller pra buscar dados.
Route::view('/view', 'welcome');

// rotas nomeadas: redirecionamento utilizando name (facilita quando tiver que 
// mudar a URL, por exemplo, sem precisar refatorar código)
Route::get('/irParaRotaNomeada', function () {
    return redirect()->route('url.name');
});
// rota nomeada.
Route::get('/name-url', function () {
    return 'Sou uma rota nomeada!';
})->name('url.name');

// Grupo de rotas:
Route::group([
    // se eu quiser passar filtros(só passa pra rota se antes autenticar---exemplo):
    'middleware' => [],
    // todas as rotas vao ter um prefixo admin:
    'prefix' => 'admin',
    // todos os controles possuem o namespace admin:
    'namespace' => 'Admin',
    // todas as rotas terao nome admin.algumaCoisa:
    'name' => 'admin.'
], function () {
    // nomeDoController@nomeDaFuncao
    Route::get('/dashboard', 'TesteController@teste')->name('dashboard');
    Route::get('/financeiro', 'TesteController@teste')->name('financeiro');
    Route::get('/fdp', 'TesteController@teste')->name('fdp');
    Route::get('/', function () {
        return redirect()->route('dashboard');
    })->name('home');
});


// Rotas utilizando controllers:

// nomeDoController@nomeDaFuncao
Route::get('/products', 'ProductController@index')->name('products.index');
