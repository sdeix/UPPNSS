<?php

namespace Controller;

use Model\Post;
use Model\Book;
use Model\Reader;
use Model\Borrowedbooks;
use Model\BookHistorys;
use Src\Request;
use Src\View;
use Model\User;
use Src\Auth\Auth;

class Site
{
public function index(): string
{
   $posts = Post::all();
   return (new View())->render('site.post', ['posts' => $posts]);
}


   public function books(): string
   {
   $books = Book::all();
       return new View('site.books', ['books' => $books]);
   }


   public function readers(): string
   {
   $readers = Reader::all();
       return new View('site.readers', ['readers' => $readers]);
   }

   public function borrowedbooks(): string
   {
   $books = Borrowedbooks::all();
       return new View('site.borrowedbooks', ['books' => $books]);
   }

   public function bookhistorys(): string
   {
   $books = BookHistorys::all();
       return new View('site.bookhistorys', ['books' => $books]);
   }









public function signup(Request $request): string
{
   if ($request->method === 'POST' && User::create($request->all())) {
       app()->route->redirect('/go');
   }
   return new View('site.signup');
}
public function login(Request $request): string
{
   //Если просто обращение к странице, то отобразить форму
   if ($request->method === 'GET') {
       return new View('site.login');
   }
   //Если удалось аутентифицировать пользователя, то редирект
   if (Auth::attempt($request->all())) {
       app()->route->redirect('/books');
   }
   //Если аутентификация не удалась, то сообщение об ошибке
   return new View('site.login', ['message' => 'Неправильные логин или пароль']);
}

public function logout(): void
{
   Auth::logout();
   app()->route->redirect('/books');
}


}
