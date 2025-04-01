
<!doctype html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Сетка СТОЛОВ</title>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <main class="table-grid-container">
      <div class="main-wrapper">
        <header class="main-header">
          <div class="header-content">
            <div class="logo-section">
              <div class="logo-container">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/5527810c9c3d4450c295c0ebc7491751d9ed3eb4bf0e4d9fa06c25f55328384f?placeholderIfAbsent=true"
                  class="logo-image"
                  alt="Logo"
                />
                <a href="http://pandoroom/" class="site-link">Перейти на сайт</a>
              </div>
            </div>
            <div class="navigation-section">
              <div class="navigation-container">
                <nav class="main-nav">
                  <a href="{{ route('admin.create') }}" class="nav-link nav-link-active">Cоздать квест</a>
                  <a href="#" class="nav-link">Сетка квестов</a>
                  <a href="#" class="nav-link">Все брони</a>
                  <a href="#" class="nav-link">Отчеты</a>
                </nav>
                <div class="user-greeting">Привет, Наталья М.</div>
              </div>
            </div>
          </div>
        </header>
        <section class="content-section">
          <div class="tabs-and-date">
            <div class="tabs-container">
              <a href="#" class="tab-link tab-inactive">Столы</a>
              <a href="#" class="tab-link tab-active">Квесты</a>
            </div>
            <div class="date-selection">
              <div class="date-option date-today">Сегодня — 24.07 (ср)</div>
              <div class="date-option">25.07 (чт)</div>
              <div class="date-option">26.07 (пт)</div>
              <div class="date-option">27.07 (сб)</div>
              <div class="date-option">28.07 (вс)</div>
              <div class="date-option">29.07 (пн)</div>
              <div class="date-option date-picker">Выбрать дату</div>
            </div>
          </div>
          <div class="category-filters">
            <div class="category-item">CAFE</div>
            <div class="category-item">LOUNGE</div>
            <div class="category-item">KIDS</div>
          </div>
          <div class="location-filters">
            <div class="location-item">Плэха</div>
            <div class="location-item">Вход</div>
            <div class="location-item">Бар</div>
            <div class="location-item">2</div>
            <div class="location-item">3</div>
            <div class="location-item">4</div>
            <div class="location-item">5</div>
            <div class="location-item">6</div>
            <div class="location-item">7</div>
            <div class="location-item">8</div>
            <div class="location-item">9</div>
            <div class="location-item">10</div>
            <div class="location-item">11</div>
            <div class="location-item">12</div>
            <div class="location-item">13</div>
            <div class="location-item">1</div>
            <div class="location-item">2</div>
            <div class="location-item">3</div>
            <div class="location-item">4</div>
            <div class="location-item">5</div>
            <div class="location-item">6</div>
            <div class="location-item">7</div>
          </div>
          <div class="resource-filters">
            <div class="resource-item">PS4 + П 22</div>
            <div class="resource-item">PS4 + Т 7</div>
            <div class="resource-item">PS5 + П 12</div>
            <div class="resource-item">5</div>
            <div class="resource-item">PS4 + T 5</div>
            <div class="resource-item">PS4 + T 9</div>
            <div class="resource-item">PS4 + T 9</div>
            <div class="resource-item">PS4 + T 8</div>
            <div class="resource-item">PS4 + П 10</div>
            <div class="resource-item">PS4 + П 5</div>
            <div class="resource-item">PS4 + П 5</div>
            <div class="resource-item">PS4 + П 14</div>
            <div class="resource-item">PS4 + Т 5</div>
            <div class="resource-item">5</div>
            <div class="resource-item">5</div>
            <div class="resource-item">8</div>
            <div class="resource-item">8</div>
            <div class="resource-item">7</div>
            <div class="resource-item">7</div>
            <div class="resource-item">7</div>
            <div class="resource-item">8</div>
            <div class="resource-item">8</div>
          </div>
          <div class="time-grid">
            <div class="time-row">
              <div class="time-cell">09:30</div>
              <div class="time-cells-container">
                <div class="time-cell">09:30</div>
                <div class="time-cell">09:30</div>
                <div class="time-cell">09:30</div>
                <div class="time-cell">09:30</div>
                <div class="time-cell">09:30</div>
                <div class="time-cell">09:30</div>
                <div class="time-cell">09:30</div>
                <div class="time-cell">09:30</div>
                <div class="time-cell">09:30</div>
                <div class="time-cell">09:30</div>
                <div class="time-cell">09:30</div>
                <div class="time-cell">09:30</div>
                <div class="time-cell">09:30</div>
                <div class="time-cell">09:30</div>
                <div class="time-cell">09:30</div>
                <div class="time-cell">09:30</div>
                <div class="time-cell">09:30</div>
                <div class="time-cell">09:30</div>
                <div class="time-cell">09:30</div>
                <div class="time-cell">09:30</div>
                <div class="time-cell">09:30</div>
                <div class="time-cell">09:30</div>
              </div>
            </div>
            <div class="time-row">
              <div class="time-cell">10:00</div>
              <div class="time-cells-container">
                <div class="time-cell">10:00</div>
                <div class="time-cell">10:00</div>
                <div class="time-cell">10:00</div>
                <div class="time-cell">10:00</div>
                <div class="time-cell">10:00</div>
                <div class="time-cell">10:00</div>
                <div class="time-cell">10:00</div>
                <div class="time-cell">10:00</div>
                <div class="time-cell">10:00</div>
                <div class="time-cell">10:00</div>
                <div class="time-cell time-cell-highlighted">10:00</div>
                <div class="time-cell">10:00</div>
                <div class="time-cell">10:00</div>
                <div class="time-cell">10:00</div>
                <div class="time-cell">10:00</div>
                <div class="time-cell">10:00</div>
                <div class="time-cell">10:00</div>
                <div class="time-cell">10:00</div>
                <div class="time-cell">10:00</div>
                <div class="time-cell">10:00</div>
                <div class="time-cell">10:00</div>
                <div class="time-cell">10:00</div>
              </div>
            </div>
            <div class="time-row">
              <div class="time-cell">10:30</div>
              <div class="time-cells-container">
                <div class="time-cell">10:30</div>
                <div class="time-cell">10:30</div>
                <div class="time-cell">10:30</div>
                <div class="time-cell">10:30</div>
                <div class="time-cell">10:30</div>
                <div class="time-cell">10:30</div>
                <div class="time-cell">10:30</div>
                <div class="time-cell">10:30</div>
                <div class="time-cell">10:30</div>
                <div class="time-cell">10:30</div>
                <div class="time-cell time-cell-highlighted">10:30</div>
                <div class="time-cell">10:30</div>
                <div class="time-cell">10:30</div>
                <div class="time-cell">10:30</div>
                <div class="time-cell">10:30</div>
                <div class="time-cell">10:30</div>
                <div class="time-cell">10:30</div>
                <div class="time-cell">10:30</div>
                <div class="time-cell">10:30</div>
                <div class="time-cell">10:30</div>
                <div class="time-cell">10:30</div>
                <div class="time-cell">10:30</div>
              </div>
            </div>
            <div class="time-row">
              <div class="time-cell">11:00</div>
              <div class="time-cells-container">
                <div class="time-cell">11:00</div>
                <div class="time-cell">11:00</div>
                <div class="time-cell">11:00</div>
                <div class="time-cell">11:00</div>
                <div class="time-cell">11:00</div>
                <div class="time-cell">11:00</div>
                <div class="time-cell">11:00</div>
                <div class="time-cell">11:00</div>
                <div class="time-cell">11:00</div>
                <div class="time-cell">11:00</div>
                <div class="time-cell time-cell-highlighted">11:00</div>
                <div class="time-cell">11:00</div>
                <div class="time-cell">11:00</div>
                <div class="time-cell">11:00</div>
                <div class="time-cell">11:00</div>
                <div class="time-cell">11:00</div>
                <div class="time-cell">11:00</div>
                <div class="time-cell">11:00</div>
                <div class="time-cell">11:00</div>
                <div class="time-cell">11:00</div>
                <div class="time-cell">11:00</div>
                <div class="time-cell">11:00</div>
              </div>
            </div>
            <div class="time-row">
              <div class="time-cell">11:30</div>
              <div class="time-cells-container">
                <div class="time-cell">11:30</div>
                <div class="time-cell">11:30</div>
                <div class="time-cell">11:30</div>
                <div class="time-cell">11:30</div>
                <div class="time-cell">11:30</div>
                <div class="time-cell">11:30</div>
                <div class="time-cell">11:30</div>
                <div class="time-cell">11:30</div>
                <div class="time-cell">11:30</div>
                <div class="time-cell">11:30</div>
                <div class="time-cell time-cell-highlighted">11:30</div>
                <div class="time-cell">11:30</div>
                <div class="time-cell">11:30</div>
                <div class="time-cell">11:30</div>
                <div class="time-cell">11:30</div>
                <div class="time-cell">11:30</div>
                <div class="time-cell">11:30</div>
                <div class="time-cell">11:30</div>
                <div class="time-cell">11:30</div>
                <div class="time-cell">11:30</div>
                <div class="time-cell">11:30</div>
                <div class="time-cell">11:30</div>
              </div>
            </div>
            <div class="time-row">
              <div class="time-cell">12:00</div>
              <div class="time-cells-container">
                <div class="time-cell">12:00</div>
                <div class="time-cell">12:00</div>
                <div class="time-cell">12:00</div>
                <div class="time-cell">12:00</div>
                <div class="time-cell">12:00</div>
                <div class="time-cell">12:00</div>
                <div class="time-cell">12:00</div>
                <div class="time-cell">12:00</div>
                <div class="time-cell">12:00</div>
                <div class="time-cell">12:00</div>
                <div class="time-cell time-cell-highlighted">12:00</div>
                <div class="time-cell">12:00</div>
                <div class="time-cell">12:00</div>
                <div class="time-cell">12:00</div>
                <div class="time-cell">12:00</div>
                <div class="time-cell">12:00</div>
                <div class="time-cell">12:00</div>
                <div class="time-cell">12:00</div>
                <div class="time-cell">12:00</div>
                <div class="time-cell">12:00</div>
                <div class="time-cell">12:00</div>
                <div class="time-cell">12:00</div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <section class="extended-grid">
        <div class="time-cell">12:30</div>
        <div class="time-cell time-cell-offset">12:30</div>
        <div class="time-cell">13:00</div>
        <div class="time-cell time-cell-offset">13:00</div>
        <div class="time-cell">13:30</div>
        <div class="time-cell time-cell-offset">13:30</div>
        <div class="extended-grid-container">
          <div class="extended-row">
            <div class="time-cell">12:30</div>
            <div class="time-cell">12:30</div>
            <div class="time-cell">12:30</div>
            <div class="time-cell">12:30</div>
            <div class="time-cell">12:30</div>
            <div class="time-cell">12:30</div>
            <div class="time-cell">12:30</div>
            <div class="time-cell">12:30</div>
            <div class="time-cell">12:30</div>
            <div class="time-cell">12:30</div>
            <div class="time-cell time-cell-highlighted">12:30</div>
            <div class="time-cell">12:30</div>
            <div class="time-cell">12:30</div>
            <div class="time-cell">12:30</div>
            <div class="time-cell">12:30</div>
            <div class="time-cell">12:30</div>
            <div class="time-cell">12:30</div>
            <div class="time-cell">12:30</div>
            <div class="time-cell">12:30</div>
            <div class="time-cell">12:30</div>
          </div>
          <div class="extended-row">
            <div class="time-cell">13:00</div>
            <div class="time-cell">13:00</div>
            <div class="time-cell">13:00</div>
            <div class="time-cell">13:00</div>
            <div class="time-cell">13:00</div>
            <div class="time-cell">13:00</div>
            <div class="time-cell">13:00</div>
            <div class="time-cell">13:00</div>
            <div class="time-cell">13:00</div>
            <div class="time-cell">13:00</div>
            <div class="time-cell time-cell-highlighted">13:00</div>
            <div class="time-cell">13:00</div>
            <div class="time-cell">13:00</div>
            <div class="time-cell">13:00</div>
            <div class="time-cell">13:00</div>
            <div class="time-cell">13:00</div>
            <div class="time-cell">13:00</div>
            <div class="time-cell">13:00</div>
            <div class="time-cell">13:00</div>
            <div class="time-cell">13:00</div>
          </div>
          <div class="extended-row">
            <div class="time-cell">13:30</div>
            <div class="time-cell">13:30</div>
            <div class="time-cell">13:30</div>
            <div class="time-cell">13:30</div>
            <div class="time-cell">13:30</div>
            <div class="time-cell">13:30</div>
            <div class="time-cell">13:30</div>
            <div class="time-cell">13:30</div>
            <div class="time-cell">13:30</div>
            <div class="time-cell">13:30</div>
            <div class="time-cell time-cell-highlighted">13:30</div>
            <div class="time-cell">13:30</div>
            <div class="time-cell">13:30</div>
            <div class="time-cell">13:30</div>
            <div class="time-cell">13:30</div>
            <div class="time-cell">13:30</div>
            <div class="time-cell">13:30</div>
            <div class="time-cell">13:30</div>
            <div class="time-cell">13:30</div>
            <div class="time-cell">13:30</div>
          </div>
          <div class="extended-row">
            <div class="time-cell">14:00</div>
            <div class="time-cell">14:00</div>
            <div class="time-cell">14:00</div>
            <div class="time-cell">14:00</div>
            <div class="time-cell">14:00</div>
            <div class="time-cell">14:00</div>
            <div class="time-cell">14:00</div>
            <div class="time-cell">14:00</div>
            <div class="time-cell time-cell-highlighted">14:00</div>
            <div class="time-cell">14:00</div>
            <div class="time-cell">14:00</div>
            <div class="time-cell">14:00</div>
            <div class="time-cell">14:00</div>
            <div class="time-cell">14:00</div>
            <div class="time-cell">14:00</div>
            <div class="time-cell">14:00</div>
            <div class="time-cell">14:00</div>
            <div class="time-cell">14:00</div>
            <div class="time-cell">14:00</div>
            <div class="time-cell">14:00</div>
          </div>
          <div class="extended-row">
            <div class="time-cell">14:30</div>
            <div class="time-cell">14:30</div>
            <div class="time-cell">14:30</div>
            <div class="time-cell">14:30</div>
            <div class="time-cell">14:30</div>
            <div class="time-cell">14:30</div>
            <div class="time-cell">14:30</div>
            <div class="time-cell">14:30</div>
            <div class="time-cell time-cell-highlighted">14:30</div>
            <div class="time-cell">14:30</div>
            <div class="time-cell">14:30</div>
            <div class="time-cell">14:30</div>
            <div class="time-cell">14:30</div>
            <div class="time-cell">14:30</div>
            <div class="time-cell">14:30</div>
            <div class="time-cell">14:30</div>
            <div class="time-cell">14:30</div>
            <div class="time-cell">14:30</div>
            <div class="time-cell">14:30</div>
            <div class="time-cell">14:30</div>
          </div>
          <div class="extended-row">
            <div class="time-cell">15:00</div>
            <div class="time-cell">15:00</div>
            <div class="time-cell">15:00</div>
            <div class="time-cell">15:00</div>
            <div class="time-cell">15:00</div>
            <div class="time-cell">15:00</div>
            <div class="time-cell">15:00</div>
            <div class="time-cell">15:00</div>
            <div class="time-cell time-cell-highlighted">15:00</div>
            <div class="time-cell">15:00</div>
            <div class="time-cell">15:00</div>
            <div class="time-cell">15:00</div>
            <div class="time-cell">15:00</div>
            <div class="time-cell">15:00</div>
            <div class="time-cell">15:00</div>
            <div class="time-cell">15:00</div>
            <div class="time-cell">15:00</div>
            <div class="time-cell">15:00</div>
            <div class="time-cell">15:00</div>
            <div class="time-cell">15:00</div>
          </div>
        </div>
        <div class="booking-card green-booking">
          <div class="booking-content">
            <div class="booking-info">
              <div class="customer-name">Елена</div>
              <div class="booking-time">
                <div class="time-start">12:30</div>
                <div class="time-end">15:30</div>
              </div>
            </div>
            <div class="booking-type">Квест</div>
          </div>
        </div>
        <div class="time-cell">14:00</div>
        <div class="time-cell time-cell-offset">14:00</div>
        <div class="time-cell">14:30</div>
        <div class="time-cell time-cell-offset">14:30</div>
        <div class="time-cell">15:00</div>
        <div class="time-cell time-cell-offset">15:00</div>
        <div class="time-cell">15:30</div>
        <div class="time-cells-row">
          <div class="time-cell">15:30</div>
          <div class="time-cell">15:30</div>
          <div class="time-cell">15:30</div>
          <div class="time-cell">15:30</div>
          <div class="time-cell">15:30</div>
          <div class="time-cell">15:30</div>
          <div class="time-cell">15:30</div>
        </div>
        <div class="time-cell time-cell-offset">15:30</div>
        <div class="time-cell">16:00</div>
        <div class="extended-grid-container-2">
          <div class="extended-row">
            <div class="time-cell time-cell-highlighted">15:30</div>
            <div class="time-cell">15:30</div>
            <div class="time-cell">15:30</div>
            <div class="time-cell">15:30</div>
            <div class="time-cell">15:30</div>
            <div class="time-cell">15:30</div>
            <div class="time-cell">15:30</div>
            <div class="time-cell">15:30</div>
            <div class="time-cell">15:30</div>
            <div class="time-cell">15:30</div>
            <div class="time-cell">15:30</div>
            <div class="time-cell">15:30</div>
          </div>
          <div class="extended-row">
            <div class="time-cell">16:00</div>
            <div class="time-cell">16:00</div>
            <div class="time-cell">16:00</div>
            <div class="time-cell">16:00</div>
            <div class="time-cell">16:00</div>
            <div class="time-cell">16:00</div>
            <div class="time-cell">16:00</div>
            <div class="time-cell">16:00</div>
            <div class="time-cell">16:00</div>
            <div class="time-cell">16:00</div>
            <div class="time-cell">16:00</div>
            <div class="time-cell">16:00</div>
          </div>
          <div class="extended-row">
            <div class="time-cell">16:30</div>
            <div class="time-cell">16:30</div>
            <div class="time-cell">16:30</div>
            <div class="time-cell">16:30</div>
            <div class="time-cell">16:30</div>
            <div class="time-cell">16:30</div>
            <div class="time-cell">16:30</div>
            <div class="time-cell">16:30</div>
            <div class="time-cell">16:30</div>
            <div class="time-cell">16:30</div>
            <div class="time-cell">16:30</div>
            <div class="time-cell">16:30</div>
          </div>
          <div class="extended-row">
            <div class="time-cell">17:00</div>
            <div class="time-cell">17:00</div>
            <div class="time-cell">17:00</div>
            <div class="time-cell">17:00</div>
            <div class="time-cell">17:00</div>
            <div class="time-cell">17:00</div>
            <div class="time-cell">17:00</div>
            <div class="time-cell">17:00</div>
            <div class="time-cell">17:00</div>
            <div class="time-cell">17:00</div>
            <div class="time-cell">17:00</div>
            <div class="time-cell">17:00</div>
          </div>
        </div>
        <div class="time-cell">16:30</div>
        <div class="booking-card yellow-booking">
          <div class="booking-content">
            <div class="booking-info">
              <div class="customer-name">Сергей</div>
              <div class="booking-time">
                <div class="time-start">15:30</div>
                <div class="time-end">18:30</div>
              </div>
            </div>
            <div class="booking-type">Квест</div>
          </div>
        </div>
        <div class="time-cell">17:00</div>
        <div class="extended-grid-container-3">
          <div class="extended-row">
            <div class="time-cell">16:00</div>
            <div class="time-cell">16:00</div>
            <div class="time-cell">16:00</div>
            <div class="time-cell">16:00</div>
            <div class="time-cell">16:00</div>
            <div class="time-cell">16:00</div>
            <div class="time-cell">16:00</div>
            <div class="time-cell">16:00</div>
          </div>
          <div class="extended-row">
            <div class="time-cell">16:30</div>
            <div class="time-cell">16:30</div>
            <div class="time-cell">16:30</div>
            <div class="time-cell">16:30</div>
            <div class="time-cell">16:30</div>
            <div class="time-cell">16:30</div>
            <div class="time-cell">16:30</div>
            <div class="time-cell">16:30</div>
          </div>
          <div class="extended-row">
            <div class="time-cell">17:00</div>
            <div class="time-cell">17:00</div>
            <div class="time-cell">17:00</div>
            <div class="time-cell">17:00</div>
            <div class="time-cell">17:00</div>
            <div class="time-cell">17:00</div>
            <div class="time-cell">17:00</div>
            <div class="time-cell">17:00</div>
          </div>
          <div class="extended-row">
            <div class="time-cell">17:30</div>
            <div class="time-cell">17:30</div>
            <div class="time-cell">17:30</div>
            <div class="time-cell">17:30</div>
            <div class="time-cell">17:30</div>
            <div class="time-cell">17:30</div>
            <div class="time-cell">17:30</div>
            <div class="time-cell">17:30</div>
          </div>
          <div class="extended-row">
            <div class="time-cell">18:00</div>
            <div class="time-cell">18:00</div>
            <div class="time-cell">18:00</div>
            <div class="time-cell">18:00</div>
            <div class="time-cell">18:00</div>
            <div class="time-cell">18:00</div>
            <div class="time-cell">18:00</div>
            <div class="time-cell">18:00</div>
          </div>
          <div class="extended-row">
            <div class="time-cell">18:30</div>
            <div class="time-cell">18:30</div>
            <div class="time-cell">18:30</div>
            <div class="time-cell">18:30</div>
            <div class="time-cell">18:30</div>
            <div class="time-cell">18:30</div>
            <div class="time-cell">18:30</div>
            <div class="time-cell">18:30</div>
          </div>
        </div>
        <div class="time-cell">17:30</div>
        <div class="time-cell time-cell-offset-right">17:30</div>
      </section>
      <section class="time-section">
        <div class="time-column">
          <div class="time-cell">12:30</div>
          <div class="time-cell">13:00</div>
          <div class="time-cell">13:30</div>
          <div class="time-cell">14:00</div>
          <div class="time-cell">14:30</div>
          <div class="time-cell">15:00</div>
          <div class="time-cell">15:30</div>
          <div class="time-cell">16:00</div>
          <div class="time-cell">16:30</div>
          <div class="time-cell">17:00</div>
          <div class="time-cell">17:30</div>
          <div class="time-cell">18:00</div>
          <div class="time-cell">18:30</div>
          <div class="time-cell">19:00</div>
          <div class="time-cell">19:30</div>
          <div class="time-cell">20:00</div>
          <div class="time-cell">21:30</div>
          <div class="time-cell">22:00</div>
          <div class="time-cell">22:30</div>
          <div class="time-cell">23:00</div>
          <div class="time-cell">23:30</div>
          <div class="time-cell">00:00</div>
        </div>
        <div class="time-grid-section">
          <div class="extended-row">
            <div class="time-cell">17:30</div>
            <div class="time-cell">17:30</div>
            <div class="time-cell">17:30</div>
            <div class="time-cell">17:30</div>
            <div class="time-cell">17:30</div>
            <div class="time-cell">17:30</div>
            <div class="time-cell">17:30</div>
          </div>
          <div class="extended-row">
            <div class="time-cell">18:00</div>
            <div class="time-cell">18:00</div>
            <div class="time-cell">18:00</div>
            <div class="time-cell">18:00</div>
            <div class="time-cell">18:00</div>
            <div class="time-cell">18:00</div>
            <div class="time-cell">18:00</div>
          </div>
          <div class="extended-row">
            <div class="time-cell">18:30</div>
            <div class="time-cell">18:30</div>
            <div class="time-cell">18:30</div>
            <div class="time-cell">18:30</div>
            <div class="time-cell">18:30</div>
            <div class="time-cell">18:30</div>
            <div class="time-cell">18:30</div>
          </div>
        </div>
        <div class="time-cell">18:00</div>
        <div class="time-cell time-cell-offset-right">18:00</div>
        <div class="time-grid-section-2">
          <div class="extended-row">
            <div class="time-cell">17:30</div>
            <div class="time-cell">17:30</div>
            <div class="time-cell">17:30</div>
            <div class="time-cell">17:30</div>
          </div>
          <div class="extended-row">
            <div class="time-cell">18:00</div>
            <div class="time-cell">18:00</div>
            <div class="time-cell">18:00</div>
            <div class="time-cell">18:00</div>
          </div>
          <div class="extended-row">
            <div class="time-cell">18:30</div>
            <div class="time-cell">18:30</div>
            <div class="time-cell">18:30</div>
            <div class="time-cell">18:30</div>
          </div>
          <div class="extended-row">
            <div class="time-cell">19:00</div>
            <div class="time-cell">19:00</div>
            <div class="time-cell">19:00</div>
            <div class="time-cell">19:00</div>
          </div>
          <div class="extended-row">
            <div class="time-cell">19:30</div>
            <div class="time-cell">19:30</div>
            <div class="time-cell">19:30</div>
            <div class="time-cell">19:30</div>
          </div>
        </div>
        <div class="booking-card green-booking">
          <div class="booking-content">
            <div class="booking-info">
              <div class="customer-name">Конст...</div>
              <div class="booking-time">
                <div class="time-start">17:30</div>
                <div class="time-end">19:30</div>
              </div>
            </div>
            <div class="booking-type">Квест</div>
          </div>
        </div>
        <div class="time-cell">18:30</div>
        <div class="time-cell time-cell-offset-right">18:30</div>
        <div class="time-cell">19:00</div>
      </section>
      <section class="time-section-2">
        <div class="time-column">
          <div class="time-cell">15:30</div>
          <div class="time-cell">16:00</div>
          <div class="time-cell">16:30</div>
          <div class="time-cell">17:00</div>
          <div class="time-cell">17:30</div>
          <div class="time-cell">18:00</div>
          <div class="time-cell">18:30</div>
          <div class="time-cell">19:00</div>
          <div class="time-cell">19:30</div>
          <div class="time-cell">20:00</div>
          <div class="time-cell">21:30</div>
          <div class="time-cell">22:00</div>
          <div class="time-cell">22:30</div>
          <div class="time-cell">23:00</div>
          <div class="time-cell">23:30</div>
          <div class="time-cell">00:00</div>
        </div>
        <div class="time-grid-section-3">
          <div class="extended-row">
            <div class="time-cell">19:00</div>
            <div class="time-cell">19:00</div>
            <div class="time-cell">19:00</div>
            <div class="time-cell">19:00</div>
            <div class="time-cell">19:00</div>
            <div class="time-cell">19:00</div>
            <div class="time-cell">19:00</div>
            <div class="time-cell">19:00</div>
            <div class="time-cell">19:00</div>
            <div class="time-cell">19:00</div>
            <div class="time-cell">19:00</div>
            <div class="time-cell">19:00</div>
            <div class="time-cell">19:00</div>
            <div class="time-cell">19:00</div>
            <div class="time-cell">19:00</div>
            <div class="time-cell">19:00</div>
          </div>
          <div class="extended-row">
            <div class="time-cell">19:30</div>
            <div class="time-cell">19:30</div>
            <div class="time-cell">19:30</div>
            <div class="time-cell">19:30</div>
            <div class="time-cell">19:30</div>
            <div class="time-cell">19:30</div>
            <div class="time-cell">19:30</div>
            <div class="time-cell">19:30</div>
            <div class="time-cell">19:30</div>
            <div class="time-cell time-cell-highlighted">19:30</div>
            <div class="time-cell">19:30</div>
            <div class="time-cell">19:30</div>
            <div class="time-cell">19:30</div>
            <div class="time-cell">19:30</div>
            <div class="time-cell">19:30</div>
            <div class="time-cell">19:30</div>
          </div>
        </div>
        <div class="time-cell time-cell-bottom">19:30</div>
      </section>
      <section class="time-section-3">
        <div class="extended-row">
          <div class="time-cell">20:00</div>
          <div class="time-cell">20:00</div>
          <div class="time-cell">20:00</div>
          <div class="time-cell">20:00</div>
          <div class="time-cell">20:00</div>
          <div class="time-cell">20:00</div>
          <div class="time-cell">20:00</div>
          <div class="time-cell">20:00</div>
          <div class="time-cell">20:00</div>
          <div class="time-cell time-cell-highlighted">20:00</div>
          <div class="time-cell">20:00</div>
          <div class="time-cell">20:00</div>
          <div class="time-cell">20:00</div>
          <div class="time-cell">20:00</div>
          <div class="time-cell">20:00</div>
          <div class="time-cell">20:00</div>
          <div class="time-cell">20:00</div>
          <div class="time-cell">20:00</div>
          <div class="time-cell">20:00</div>
          <div class="time-cell">20:00</div>
          <div class="time-cell">20:00</div>
        </div>
        <div class="extended-row">
          <div class="time-cell">21:30</div>
          <div class="time-cell">21:30</div>
          <div class="time-cell">21:30</div>
          <div class="time-cell">21:30</div>
          <div class="time-cell">21:30</div>
          <div class="time-cell">21:30</div>
          <div class="time-cell">21:30</div>
          <div class="time-cell">21:30</div>
          <div class="time-cell">21:30</div>
          <div class="time-cell time-cell-highlighted">21:30</div>
          <div class="time-cell">21:30</div>
          <div class="time-cell">21:30</div>
          <div class="time-cell">21:30</div>
          <div class="time-cell">21:30</div>
          <div class="time-cell">21:30</div>
          <div class="time-cell">21:30</div>
          <div class="time-cell">21:30</div>
          <div class="time-cell">21:30</div>
          <div class="time-cell">21:30</div>
          <div class="time-cell">21:30</div>
          <div class="time-cell">21:30</div>
        </div>
        <div class="extended-row">
          <div class="time-cell">22:00</div>
          <div class="time-cell">22:00</div>
          <div class="time-cell">22:00</div>
          <div class="time-cell">22:00</div>
          <div class="time-cell">22:00</div>
          <div class="time-cell">22:00</div>
          <div class="time-cell">22:00</div>
          <div class="time-cell">22:00</div>
          <div class="time-cell">22:00</div>
          <div class="time-cell time-cell-highlighted">22:00</div>
          <div class="time-cell">22:00</div>
          <div class="time-cell">22:00</div>
          <div class="time-cell">22:00</div>
          <div class="time-cell">22:00</div>
          <div class="time-cell">22:00</div>
          <div class="time-cell">22:00</div>
          <div class="time-cell">22:00</div>
          <div class="time-cell">22:00</div>
          <div class="time-cell">22:00</div>
          <div class="time-cell">22:00</div>
          <div class="time-cell">22:00</div>
        </div>
        <div class="extended-row">
          <div class="time-cell">22:30</div>
          <div class="time-cell">22:30</div>
          <div class="time-cell">22:30</div>
          <div class="time-cell">22:30</div>
          <div class="time-cell">22:30</div>
          <div class="time-cell">22:30</div>
          <div class="time-cell">22:30</div>
          <div class="time-cell">22:30</div>
          <div class="time-cell">22:30</div>
          <div class="time-cell time-cell-highlighted">22:30</div>
          <div class="time-cell">22:30</div>
          <div class="time-cell">22:30</div>
          <div class="time-cell">22:30</div>
          <div class="time-cell">22:30</div>
          <div class="time-cell">22:30</div>
          <div class="time-cell">22:30</div>
          <div class="time-cell">22:30</div>
          <div class="time-cell">22:30</div>
          <div class="time-cell">22:30</div>
          <div class="time-cell">22:30</div>
          <div class="time-cell">22:30</div>
        </div>
        <div class="extended-row">
          <div class="time-cell">23:00</div>
          <div class="time-cell">23:00</div>
          <div class="time-cell">23:00</div>
          <div class="time-cell">23:00</div>
          <div class="time-cell">23:00</div>
          <div class="time-cell">23:00</div>
          <div class="time-cell">23:00</div>
          <div class="time-cell">23:00</div>
          <div class="time-cell">23:00</div>
          <div class="time-cell time-cell-highlighted">23:00</div>
          <div class="time-cell">23:00</div>
          <div class="time-cell">23:00</div>
          <div class="time-cell">23:00</div>
          <div class="time-cell">23:00</div>
          <div class="time-cell">23:00</div>
          <div class="time-cell">23:00</div>
          <div class="time-cell">23:00</div>
          <div class="time-cell">23:00</div>
          <div class="time-cell">23:00</div>
          <div class="time-cell">23:00</div>
          <div class="time-cell">23:00</div>
        </div>
        <div class="extended-row">
          <div class="time-cell">23:30</div>
          <div class="time-cell">23:30</div>
          <div class="time-cell">23:30</div>
          <div class="time-cell">23:30</div>
          <div class="time-cell">23:30</div>
          <div class="time-cell">23:30</div>
          <div class="time-cell">23:30</div>
          <div class="time-cell">23:30</div>
          <div class="time-cell">23:30</div>
          <div class="time-cell time-cell-highlighted">23:30</div>
          <div class="time-cell">23:30</div>
          <div class="time-cell">23:30</div>
          <div class="time-cell">23:30</div>
          <div class="time-cell">23:30</div>
          <div class="time-cell">23:30</div>
          <div class="time-cell">23:30</div>
          <div class="time-cell">23:30</div>
          <div class="time-cell">23:30</div>
          <div class="time-cell">23:30</div>
          <div class="time-cell">23:30</div>
          <div class="time-cell">23:30</div>
        </div>
        <div class="extended-row">
          <div class="time-cell">00:00</div>
          <div class="time-cell">00:00</div>
          <div class="time-cell">00:00</div>
          <div class="time-cell">00:00</div>
          <div class="time-cell">00:00</div>
          <div class="time-cell">00:00</div>
          <div class="time-cell">00:00</div>
          <div class="time-cell">00:00</div>
          <div class="time-cell">00:00</div>
          <div class="time-cell time-cell-highlighted">00:00</div>
          <div class="time-cell">00:00</div>
          <div class="time-cell">00:00</div>
          <div class="time-cell">00:00</div>
          <div class="time-cell">00:00</div>
          <div class="time-cell">00:00</div>
          <div class="time-cell">00:00</div>
          <div class="time-cell">00:00</div>
          <div class="time-cell">00:00</div>
          <div class="time-cell">00:00</div>
          <div class="time-cell">00:00</div>
          <div class="time-cell">00:00</div>
        </div>
      </section>
    </main>
    <script>
      (() => {
        const state = {};

        let context = null;
        let nodesToDestroy = [];
        let pendingUpdate = false;

        function destroyAnyNodes() {
          nodesToDestroy.forEach((el) => el.remove());
          nodesToDestroy = [];
        }

        function update() {
          if (pendingUpdate === true) {
            return;
          }
          pendingUpdate = true;

          document.querySelectorAll("[data-el='div-1']").forEach((el) => {
            el.setAttribute("space", 50);
          });

          destroyAnyNodes();

          pendingUpdate = false;
        }

        update();
      })();
    </script>
  </body>
  <style>
  
  .table-grid-container {
  background-color: rgba(247, 247, 247, 1);
  display: flex;
  padding-bottom: 69px;
  flex-direction: column;
  overflow: hidden;
  align-items: stretch;
  font-family:
    Arial,
    -apple-system,
    Roboto,
    Helvetica,
    sans-serif;
}

.main-wrapper {
  width: 100%;
}

@media (max-width: 991px) {
  .main-wrapper {
    max-width: 100%;
  }
}

.main-header {
  background-color: rgba(255, 255, 255, 1);
  width: 100%;
  padding: 33px 50px;
}

@media (max-width: 991px) {
  .main-header {
    max-width: 100%;
    padding: 33px 20px;
  }
}

.header-content {
  gap: 20px;
  display: flex;
}

@media (max-width: 991px) {
  .header-content {
    flex-direction: column;
    align-items: stretch;
    gap: 0px;
  }
}

.logo-section {
  display: flex;
  flex-direction: column;
  align-items: stretch;
  line-height: normal;
  width: 22%;
  margin-left: 0px;
}

@media (max-width: 991px) {
  .logo-section {
    width: 100%;
  }
}

.logo-container {
  display: flex;
  width: 100%;
  align-items: stretch;
  gap: 20px;
  font-size: 16px;
  color: rgba(255, 255, 255, 1);
  font-weight: 400;
}

@media (max-width: 991px) {
  .logo-container {
    margin-top: 40px;
  }
}

.logo-image {
  aspect-ratio: 7.87;
  object-fit: contain;
  object-position: center;
  width: 220px;
  margin-top: auto;
  margin-bottom: auto;
}

.site-link {
  align-self: stretch;
  border-radius: 3px;
  box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.05);
  background-color: #a3a3a3;
  padding: 10px 15px;
  gap: 10px;
  color: #fff;
  text-decoration: none;
  text-align: center;
}

.navigation-section {
  display: flex;
  flex-direction: column;
  align-items: stretch;
  line-height: normal;
  width: 78%;
  margin-left: 20px;
}

@media (max-width: 991px) {
  .navigation-section {
    width: 100%;
  }
}

.navigation-container {
  display: flex;
  width: 100%;
  align-items: stretch;
  gap: 20px;
  font-size: 16px;
  color: rgba(255, 255, 255, 1);
  font-weight: 400;
  flex-wrap: wrap;
  justify-content: space-between;
}

@media (max-width: 991px) {
  .navigation-container {
    max-width: 100%;
    margin-top: 40px;
  }
}

.main-nav {
  display: flex;
  align-items: center;
  gap: 10px;
  justify-content: start;
  flex-wrap: wrap;
}

@media (max-width: 991px) {
  .main-nav {
    max-width: 100%;
  }
}

.nav-link {
  align-self: stretch;
  margin-top: auto;
  margin-bottom: auto;
  padding: 10px 15px;
  gap: 10px;
  color: rgba(163, 163, 163, 1);
  text-decoration: none;
}

.nav-link-active {
  color: rgba(163, 163, 163, 1);
}

.nav-link:not(.nav-link-active) {
  align-self: stretch;
  border-radius: 3px;
  box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.05);
  background-color: #a3a3a3;
  margin-top: auto;
  margin-bottom: auto;
  color: #fff;
}

.user-greeting {
  align-self: stretch;
  border-radius: 3px;
  box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.05);
  background-color: #a3a3a3;
  padding: 10px 15px;
  gap: 10px;
  color: #fff;
}

.content-section {
  display: flex;
  margin-top: 58px;
  width: 100%;
  padding: 0 50px;
  flex-direction: column;
  align-items: stretch;
  font-size: 16px;
  font-weight: 400;
}

@media (max-width: 991px) {
  .content-section {
    max-width: 100%;
    padding: 0 20px;
    margin-top: 40px;
  }
}

.tabs-and-date {
  display: flex;
  margin-left: 141px;
  width: 1130px;
  max-width: 100%;
  align-items: stretch;
  gap: 40px 50px;
  flex-wrap: wrap;
}

.tabs-container {
  align-self: start;
  display: flex;
  align-items: stretch;
  white-space: nowrap;
}

@media (max-width: 991px) {
  .tabs-container {
    white-space: initial;
  }
}

.tab-link {
  align-self: stretch;
  border-radius: 3px;
  padding: 10px 15px;
  gap: 10px;
  text-decoration: none;
}

.tab-inactive {
  color: rgba(163, 163, 163, 1);
}

.tab-active {
  background-color: rgba(163, 163, 163, 1);
  box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.15);
  color: rgba(255, 255, 255, 1);
}

@media (max-width: 991px) {
  .tab-link {
    white-space: initial;
  }
}

.date-selection {
  border-radius: 3px;
  display: flex;
  align-items: center;
  gap: 9px;
  color: rgba(255, 255, 255, 1);
  justify-content: start;
  flex-wrap: wrap;
  flex-grow: 1;
  flex-shrink: 1;
  flex-basis: auto;
}

@media (max-width: 991px) {
  .date-selection {
    max-width: 100%;
  }
}

.date-option {
  align-self: stretch;
  border-radius: 3px;
  background-color: rgba(163, 163, 163, 1);
  box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.06);
  margin-top: auto;
  margin-bottom: auto;
  padding: 10px 15px;
  gap: 10px;
  color: #fff;
}

.date-today {
  border-color: rgba(247, 247, 247, 1);
  border-style: solid;
  border-width: 1px;
  background-color: transparent;
  color: rgba(163, 163, 163, 1);
}

.date-picker {
  min-height: 39px;
  padding: 11px 15px;
}

.category-filters {
  align-self: end;
  display: flex;
  margin-top: 24px;
  width: 100%;
  max-width: 1679px;
  align-items: stretch;
  font-size: 12px;
  color: rgba(110, 110, 110, 1);
  white-space: nowrap;
  flex-wrap: wrap;
}

@media (max-width: 991px) {
  .category-filters {
    max-width: 100%;
    white-space: initial;
  }
}

.category-item {
  align-self: stretch;
  border-radius: 3px;
  border: 1px solid #f7f7f7;
  background-color: #eaeaea;
  min-height: 30px;
  padding: 8px 15px;
  gap: 10px;
}

@media (max-width: 991px) {
  .category-item {
    white-space: initial;
  }
}

.location-filters {
  align-self: end;
  display: flex;
  margin-top: 9px;
  width: 100%;
  max-width: 1679px;
  align-items: stretch;
  font-size: 12px;
  color: rgba(110, 110, 110, 1);
  white-space: nowrap;
}

@media (max-width: 991px) {
  .location-filters {
    max-width: 100%;
    white-space: initial;
  }
}

.location-item {
  align-self: stretch;
  border-radius: 3px;
  border: 1px solid #f7f7f7;
  background-color: #eaeaea;
  min-height: 30px;
  padding: 8px 15px;
  gap: 10px;
}

@media (max-width: 991px) {
  .location-item {
    white-space: initial;
  }
}

.resource-filters {
  align-self: end;
  display: flex;
  margin-top: 9px;
  width: 100%;
  max-width: 1679px;
  align-items: stretch;
  font-size: 12px;
  color: rgba(110, 110, 110, 1);
}

@media (max-width: 991px) {
  .resource-filters {
    max-width: 100%;
  }
}

.resource-item {
  align-self: stretch;
  border-radius: 3px;
  border: 1px solid #f7f7f7;
  background-color: #eaeaea;
  min-height: 21px;
  padding: 4px 15px;
  gap: 10px;
  white-space: nowrap;
}

@media (max-width: 991px) {
  .resource-item {
    white-space: initial;
  }
}

.time-grid {
  display: flex;
  margin-top: 9px;
  width: 100%;
  flex-direction: column;
}

.time-row {
  display: flex;
  width: 100%;
  align-items: stretch;
  gap: 40px 62px;
  color: rgba(110, 110, 110, 1);
  white-space: nowrap;
  flex-wrap: wrap;
}

@media (max-width: 991px) {
  .time-row {
    max-width: 100%;
    white-space: initial;
  }
}

.time-cell {
  align-self: stretch;
  border-radius: 3px;
  background-color: rgba(255, 255, 255, 1);
  border-color: rgba(247, 247, 247, 1);
  border-style: solid;
  border-width: 1px;
  padding: 10px 15px;
  gap: 10px;
  color: rgba(110, 110, 110, 1);
}

@media (max-width: 991px) {
  .time-cell {
    white-space: initial;
  }
}

.time-cells-container {
  display: flex;
  align-items: stretch;
  flex-grow: 1;
  flex-shrink: 1;
  flex-basis: auto;
}

@media (max-width: 991px) {
  .time-cells-container {
    max-width: 100%;
    white-space: initial;
  }
}

.time-cell-highlighted {
  z-index: 10;
}

.extended-grid {
  align-self: end;
  z-index: 10;
  display: flex;
  margin-right: 50px;
  width: 100%;
  max-width: 1679px;
  padding-bottom: 74px;
  flex-direction: column;
  align-items: start;
  font-size: 16px;
  font-weight: 400;
  white-space: nowrap;
}

@media (max-width: 991px) {
  .extended-grid {
    max-width: 100%;
    margin-right: 10px;
    white-space: initial;
  }
}

.time-cell-offset {
  align-self: stretch;
  border-radius: 3px;
  background-color: rgba(255, 255, 255, 1);
  border-color: rgba(247, 247, 247, 1);
  border-style: solid;
  border-width: 1px;
  z-index: 10;
  margin-top: -37px;
  margin-left: 76px;
  padding: 10px 15px;
  gap: 10px;
  color: rgba(110, 110, 110, 1);
}

@media (max-width: 991px) {
  .time-cell-offset {
    margin-left: 10px;
    white-space: initial;
  }
}

.extended-grid-container {
  align-self: end;
  z-index: 10;
  margin-top: -111px;
  width: 100%;
  max-width: 1526px;
  color: rgba(110, 110, 110, 1);
}

@media (max-width: 991px) {
  .extended-grid-container {
    max-width: 100%;
    white-space: initial;
  }
}

.extended-row {
  display: flex;
  width: 100%;
  align-items: stretch;
}

@media (max-width: 991px) {
  .extended-row {
    max-width: 100%;
    white-space: initial;
  }
}

.booking-card {
  border-radius: 2px;
  z-index: 10;
  display: flex;
  min-height: 258px;
  width: 228px;
  max-width: 100%;
  padding: 72px 31px;
  align-items: center;
  gap: 10px;
  justify-content: center;
}

.green-booking {
  background-color: rgba(160, 191, 57, 1);
  margin-top: -222px;
}

.yellow-booking {
  background-color: rgba(191, 171, 57, 1);
  margin-top: -111px;
  min-height: 260px;
  width: 78px;
  padding: 73px 8px;
}

@media (max-width: 991px) {
  .booking-card {
    margin-top: -200px;
    padding: 72px 20px;
    white-space: initial;
  }
}

.booking-content {
  align-self: stretch;
  display: flex;
  margin-top: auto;
  margin-bottom: auto;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

@media (max-width: 991px) {
  .booking-content {
    white-space: initial;
  }
}

.booking-info {
  display: flex;
  width: 100%;
  flex-direction: column;
  align-items: center;
  color: rgba(255, 255, 255, 1);
  justify-content: center;
}

@media (max-width: 991px) {
  .booking-info {
    white-space: initial;
  }
}

.customer-name {
  text-align: center;
}

.booking-time {
  align-self: center;
  margin-top: 15px;
  width: 100%;
}

@media (max-width: 991px) {
  .booking-time {
    white-space: initial;
  }
}

.time-end {
  margin-top: 5px;
}

.booking-type {
  align-self: stretch;
  border-radius: 3px;
  background-color: rgba(255, 255, 255, 1);
  margin-top: 15px;
  padding: 5px 10px;
  gap: 10px;
  color: rgba(160, 191, 57, 1);
  line-height: 1;
}

.yellow-booking .booking-type {
  background-color: rgba(255, 255, 255, 0.25);
  color: rgba(191, 171, 57, 1);
}

@media (max-width: 991px) {
  .booking-type {
    white-space: initial;
  }
}

.time-cells-row {
  z-index: 10;
  display: flex;
  margin-top: -37px;
  margin-left: 153px;
  width: 534px;
  max-width: 100%;
  align-items: stretch;
  color: rgba(110, 110, 110, 1);
  flex-wrap: wrap;
}

@media (max-width: 991px) {
  .time-cells-row {
    white-space: initial;
  }
}

.time-cell-offset-right {
  align-self: end;
  border-radius: 3px;
  background-color: rgba(255, 255, 255, 1);
  border-color: rgba(247, 247, 247, 1);
  border-style: solid;
  border-width: 1px;
  z-index: 10;
  margin-top: -37px;
  margin-right: 305px;
  padding: 10px 15px;
  gap: 10px;
  color: rgba(110, 110, 110, 1);
}

@media (max-width: 991px) {
  .time-cell-offset-right {
    margin-right: 10px;
    white-space: initial;
  }
}

.extended-grid-container-2 {
  align-self: end;
  z-index: 10;
  margin-top: -74px;
  width: 916px;
  max-width: 100%;
  color: rgba(110, 110, 110, 1);
}

@media (max-width: 991px) {
  .extended-grid-container-2 {
    white-space: initial;
  }
}

.extended-grid-container-3 {
  z-index: 10;
  margin-top: -111px;
  margin-left: 76px;
  width: 611px;
  max-width: 100%;
  color: rgba(110, 110, 110, 1);
}

@media (max-width: 991px) {
  .extended-grid-container-3 {
    white-space: initial;
  }
}

.time-section {
  z-index: 10;
  display: flex;
  margin-top: -482px;
  width: 100%;
  padding: 0 50px 296px;
  flex-direction: column;
  align-items: end;
  font-size: 16px;
  font-weight: 400;
  white-space: nowrap;
}

@media (max-width: 991px) {
  .time-section {
    max-width: 100%;
    margin-top: -200px;
    padding: 0 20px 100px;
    white-space: initial;
  }
}

.time-column {
  align-self: start;
  width: 77px;
  color: rgba(110, 110, 110, 1);
}

@media (max-width: 991px) {
  .time-column {
    display: none;
    white-space: initial;
  }
}

.time-grid-section {
  z-index: 10;
  margin-top: -445px;
  margin-right: 381px;
  width: 535px;
  max-width: 100%;
  color: rgba(110, 110, 110, 1);
}

@media (max-width: 991px) {
  .time-grid-section {
    margin-top: -200px;
    margin-right: 10px;
    white-space: initial;
  }
}

.time-grid-section-2 {
  z-index: 10;
  margin-top: -74px;
  width: 306px;
  max-width: 100%;
  color: rgba(110, 110, 110, 1);
}

@media (max-width: 991px) {
  .time-grid-section-2 {
    white-space: initial;
  }
}

.time-section-2 {
  align-self: center;
  display: flex;
  margin-top: -593px;
  width: 100%;
  max-width: 1374px;
  padding-bottom: 259px;
  flex-direction: column;
  font-size: 16px;
  color: rgba(110, 110, 110, 1);
  font-weight: 400;
  white-space: nowrap;
}

@media (max-width: 991px) {
  .time-section-2 {
    max-width: 100%;
    margin-top: -200px;
    padding-bottom: 100px;
    white-space: initial;
  }
}

.time-grid-section-3 {
  align-self: center;
  z-index: 10;
  margin-top: -334px;
  width: 1222px;
  max-width: 100%;
}

@media (max-width: 991px) {
  .time-grid-section-3 {
    margin-top: -200px;
    white-space: initial;
  }
}

.time-cell-bottom {
  align-self: end;
  border-radius: 3px;
  background-color: rgba(255, 255, 255, 1);
  border-color: rgba(247, 247, 247, 1);
  border-style: solid;
  border-width: 1px;
  margin-top: -37px;
  margin-bottom: -52px;
  padding: 10px 15px;
  gap: 10px;
}

@media (max-width: 991px) {
  .time-cell-bottom {
    margin-bottom: 10px;
    white-space: initial;
  }
}

.time-section-3 {
  align-self: end;
  z-index: 10;
  margin-top: -260px;
  margin-right: 50px;
  width: 100%;
  max-width: 1603px;
  font-size: 16px;
  color: rgba(110, 110, 110, 1);
  font-weight: 400;
  white-space: nowrap;
}

@media (max-width: 991px) {
  .time-section-3 {
    max-width: 100%;
    margin-top: -200px;
    margin-right: 10px;
    white-space: initial;
  }
}

  
  </style>
</html>
