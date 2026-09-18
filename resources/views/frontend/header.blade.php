<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <header class="main-header">
    <div class="container">
      <div class="header-top">
        <div class="header-top-left">
          <a href="#">logo</a>
        </div>
        <div class="header-top-center">
          <div class="search-form-wrap">
            <form method="POST" action="/search" class="search-form">
              @csrf
              <label class="search-label">
                <input type="search" name="query" class="search-input" placeholder="Поиск на сайте">
              </label>
              <button class="search-btn search-btn-loupe"></button>
            </form>
          </div>
          <ul class="tags-list">
            <li class="tags-item">
              <a href="#" class="tag-link">link text</a>
            </li>
            <li class="tags-item">
              <a href="#" class="tag-link">link text</a>
            </li>
            <li class="tags-item">
              <a href="#" class="tag-link">link text</a>
            </li>
            <li class="tags-item">
              <a href="#" class="tag-link">link text</a>
            </li>
            <li class="tags-item">
              <a href="#" class="tag-link">link text</a>
            </li> 
          </ul>
        </div>
        <div class="header-top-right">
          <ul class="contacts-list">
            <li class="contacts-item">
              <a href="#" class="contacts-link">adress</a>
            </li>
            <li class="contacts-item">
              <a href="#" class="contacts-link">adress</a>
            </li>
            <li class="contacts-item">
              <a href="#" class="contacts-link">adress</a>
            </li>
          </ul>
        </div>
        <button class="navbar-toggler">
          <span class="toggler-icon"></span>
          <span class="toggler-icon"></span>
          <span class="toggler-icon"></span>
        </button>
      </div>
    </div>
    <div class="navigation-wrapper">
      <div class="container">
        <div class="main-navigation">
          <ul class="main-navigation-list">menu</ul>
        </div>
      </div>
    </div>
  </header>