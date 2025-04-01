<!doctype html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pandoroom - Семейный центр во Владивостоке</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    
  </head>
  <body>
    <div class="page-wrapper">
      <header class="top-bar">
        <div class="top-nav">
          <nav class="secondary-nav">
            <a href="{{ route('admin.quests') }}" class="nav-link">Администратор</a>
            <a href="#news" class="nav-link">Новости и акции</a>
            <a href="#rules" class="nav-link">Правила</a>
            <a href="#loyalty" class="nav-link">Программа лояльности</a>
            <a href="#contacts" class="nav-link">Контакты</a>
          </nav>
        </div>
      </header>

      <main class="main-content" style="background-image: url(../img/1.png);background-repeat: no-repeat;">
        <section class="header-section">
          <div class="header-container">
            <img
              src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/a871df3a351335ba0ca1f8c96010fd6f616ab0f577807a144d4c5068afbef971?placeholderIfAbsent=true"
              class="logo"
              alt="Pandoroom logo"
            />
            <div class="header-right">
              <nav class="main-nav">
                <a href="{{ route('quests.index') }}" class="nav-link">Квесты</a>
                <a href="#parties" class="nav-link">Праздники</a>
                <a href="#cafe" class="nav-link">Кафе</a>
                <a href="#playroom" class="nav-link">Игровая для детей</a>
                <a href="{{ route('profile') }}"><img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/3abe7aa3892700541b9b205c41078864bcd13de2651b08cb8dc1ad4d6ce978e1?placeholderIfAbsent=true"
                  class="search-icon"
                  alt="Search"
                /></a>
              </nav>
              <div class="contact-info">
                <div class="location-block">
                  <p class="address">
                    Нижнепортовая, 1 / Посьетская, 27 стр. 2
                  </p>
                  <p class="phone">8 423 202 26 96</p>
                </div>
                <div class="location-block">
                  <p class="address">Алеутская 17а</p>
                  <p class="phone">8 423 205 44 58</p>
                </div>
              </div>
            </div>
          </div>

          <h1 class="hero-title">
            Площадки для праздников
            <br />
            и самый большой
            <span class="highlight-underline">квеструм</span>
            <br />
            во Владивостоке
          </h1>

          <div class="cta-buttons">
            <a href="{{ route('quests.index') }}" class="cta-button">Забронировать квест</a>
            <a href="#book-party" class="cta-button">Отметить праздник</a>
          </div>

          <ul class="feature-list">
            <li>
              <span class="highlight-underline">16 разнообразных квестов</span>
              <span>для любой компании</span>
            </li>
            <li>
              <span class="highlight-underline">три зала кафе</span>
              <span>,</span>
              <span>площадью более 350 м</span>
              <span>2</span>
            </li>
            <li class="highlight-text">ваш праздник «под ключ»</li>
            <li>работаем с 2015 года</li>
          </ul>

          <h2 class="section-title">
            Устройте незабываемый
            <br />
            праздник для вашего ребенка
            <br />
            в семейном центре «Пандорум»
          </h2>
        </section>

        <section class="party-options">
          <div class="party-grid">
            <div class="party-column">
              <article class="party-card">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/173f17ba38b6b3b92cec78cad7d18a586516b5befe90695731a4549e3263fdf8?placeholderIfAbsent=true"
                  class="party-image"
                  alt="Праздники для малышей"
                />
                <div class="party-content">
                  <h3 class="party-title">
                    <span class="subtitle">Праздники</span>
                    <br />
                    <span>для малышей</span>
                  </h3>
                  <a href="#details" class="details-button">подробнее</a>
                </div>
              </article>
              <article class="party-card">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/67baca9b020d9debb8020dd007bba3911afe75d328c643397052c0c1455f67ec?placeholderIfAbsent=true"
                  class="party-image"
                  alt="Выпускные из детсада"
                />
                <div class="party-content">
                  <h3 class="party-title">
                    <span class="subtitle">Организовываем</span>
                    <br />
                    <span>Выпускные</span>
                    <br />
                    <span>из детсада</span>
                  </h3>
                  <a href="#details" class="details-button">подробнее</a>
                </div>
              </article>
            </div>

            <div class="party-column">
              <article class="party-card">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/d7b84bbe32c52f5f60334ce261e513bdf08ea378f1d41d78372430c81660d7e1?placeholderIfAbsent=true"
                  class="party-image"
                  alt="Праздники для детей 6-10 лет"
                />
                <div class="party-content">
                  <h3 class="party-title">
                    <span class="subtitle">Праздники для детей</span>
                    <br />
                    <span>6 — 10 лет</span>
                  </h3>
                  <a href="#details" class="details-button">подробнее</a>
                </div>
              </article>
              <article class="party-card">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/7b63c758d74452326aa93a5f3ce7d1cde99fe05918e41d3073a23a9936456e4f?placeholderIfAbsent=true"
                  class="party-image"
                  alt="Поступление в школу"
                />
                <div class="party-content">
                  <h3 class="party-title">
                    <span class="subtitle">Отпразднуем</span>
                    <br />
                    <span>Поступление</span>
                    <br />
                    <span>в школу</span>
                  </h3>
                  <a href="#details" class="details-button">подробнее</a>
                </div>
              </article>
            </div>

            <div class="party-column">
              <article class="party-card">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/a4814655b52752acd9e09507e4a23c0a5d19021bf6a1b0797f4ad0bd30f109fc?placeholderIfAbsent=true"
                  class="party-image"
                  alt="Праздники для детей 10-15 лет"
                />
                <div class="party-content">
                  <h3 class="party-title">
                    <span class="subtitle">Праздники для детей</span>
                    <br />
                    <span>10 — 15 лет</span>
                  </h3>
                  <a href="#details" class="details-button">подробнее</a>
                </div>
              </article>
              <article class="party-card">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/6734f34ee535ee5861235e7bb8bf827066af7078481fe0cdeaa18b352cd37681?placeholderIfAbsent=true"
                  class="party-image"
                  alt="По любому поводу"
                />
                <div class="party-content">
                  <h3 class="party-title">
                    <span class="subtitle">Устроим праздник</span>
                    <br />
                    <span>По любому</span>
                    <br />
                    <span>поводу! :)</span>
                  </h3>
                  <a href="#details" class="details-button">подробнее</a>
                </div>
              </article>
            </div>
          </div>
        </section>

        <section class="services-section">
          <p class="services-intro">
            для каждого праздника мы рады вам предложить
          </p>
          <div class="services-list">
            <div class="service-item">Lounge</div>
            <div class="service-item">Игровая</div>
            <div class="service-item">Кафе</div>
            <div class="service-item">Шоу-программа</div>
            <div class="service-item">Квесты</div>
            <div class="service-item">Торт</div>
            <div class="service-item">Пиньята</div>
          </div>
        </section>

        <section class="quests-section">
          <h2 class="section-title">Квесты с актерами во Владивостоке</h2>
          <div class="quests-grid">
            <article class="quest-card">
              <div class="quest-content">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/4cc272397f2ff0e003619d9b960bb4547d155e9d099c8c0516def716b10d0634?placeholderIfAbsent=true"
                  class="quest-image"
                  alt="Гарри Поттер и Философский камень"
                />
                <span class="quest-category">приключение</span>
                <h3 class="quest-title">
                  Гарри Поттер<br />и Философский камень
                </h3>
                <div class="quest-details">
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/ff24b40af72ed539cba7f863fb79d4c02415a310ca6b1e265a436ba4e2b81846?placeholderIfAbsent=true"
                    class="quest-icon"
                    alt="Quest details"
                  />
                  <span class="quest-duration">60 минут</span>
                  <span class="quest-players">2-6 игроков</span>
                  <span class="quest-age">12+</span>
                </div>
              </div>
            </article>

            <article class="quest-card">
              <div class="quest-content">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/010bd2f43e09ef3b679f6403292d68138c8a8f3c9d9d444e39a9faefe2c3283f?placeholderIfAbsent=true"
                  class="quest-image"
                  alt="Чумной доктор"
                />
                <span class="quest-category">мистический</span>
                <h3 class="quest-title">Чумной доктор</h3>
                <div class="quest-details">
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/59394406d1129c504c893bec9f8cb4494ec03a295abf8bdb19a6dafd7c0a70d1?placeholderIfAbsent=true"
                    class="quest-icon"
                    alt="Quest details"
                  />
                  <span class="quest-duration">60 минут</span>
                  <span class="quest-players">2-6 игроков</span>
                  <span class="quest-age">12+</span>
                </div>
              </div>
            </article>

            <article class="quest-card">
              <div class="quest-content">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/e670ae1af5c3131dbd96c404a79de2472bcd296bacdd546c0988b0c54a0b496e?placeholderIfAbsent=true"
                  class="quest-image"
                  alt="Сокровища пиратов"
                />
                <span class="quest-category">приключение</span>
                <h3 class="quest-title">Сокровища пиратов</h3>
                <div class="quest-details">
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/b6f49e27748511b46351eb8b9d32ab53b113748d617e46a7d8802d455705f932?placeholderIfAbsent=true"
                    class="quest-icon"
                    alt="Quest details"
                  />
                  <span class="quest-duration">60 минут</span>
                  <span class="quest-players">2-6 игроков</span>
                  <span class="quest-age">12+</span>
                </div>
              </div>
            </article>

            <article class="quest-card">
              <div class="quest-content">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/84c7191b03d0ad587b57b64e7fcfc5803def1ec2d9b686cd3ee6d7fba8b07403?placeholderIfAbsent=true"
                  class="quest-image"
                  alt="Resident Evil"
                />
                <span class="quest-category">хоррор</span>
                <h3 class="quest-title">Resident Evil</h3>
                <div class="quest-details">
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/59394406d1129c504c893bec9f8cb4494ec03a295abf8bdb19a6dafd7c0a70d1?placeholderIfAbsent=true"
                    class="quest-icon"
                    alt="Quest details"
                  />
                  <span class="quest-duration">80 минут</span>
                  <span class="quest-players">2-6 игроков</span>
                  <span class="quest-age">12+</span>
                </div>
              </div>
            </article>

            <article class="quest-card">
              <div class="quest-content">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/a29d66e1c9e680617c01087a6ec11eeaf9db5e1acf390a0d13284f171777fd3d?placeholderIfAbsent=true"
                  class="quest-image"
                  alt="Код Да Винчи"
                />
                <span class="quest-category">приключение</span>
                <h3 class="quest-title">Код Да Винчи</h3>
                <div class="quest-details">
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/59394406d1129c504c893bec9f8cb4494ec03a295abf8bdb19a6dafd7c0a70d1?placeholderIfAbsent=true"
                    class="quest-icon"
                    alt="Quest details"
                  />
                </div>
              </div>
            </article>
          </div>
        </section>

        <section class="quests-section">
          <h2 class="section-title">Квесты без актеров во Владивостоке</h2>
          <div class="quests-grid">
            <article class="quest-card">
              <div class="quest-content">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/0d3845ff5aab6b6789da4fe5b4a16cb95f8b7fa31de9c7be8e7b97975de07552?placeholderIfAbsent=true"
                  class="quest-image"
                  alt="Инквизиция"
                />
                <span class="quest-category">Мистический</span>
                <h3 class="quest-title">Инквизиция</h3>
                <div class="quest-details">
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/59394406d1129c504c893bec9f8cb4494ec03a295abf8bdb19a6dafd7c0a70d1?placeholderIfAbsent=true"
                    class="quest-icon"
                    alt="Quest details"
                  />
                  <span class="quest-duration">60 минут</span>
                  <span class="quest-players">2-6 игроков</span>
                  <span class="quest-age">12+</span>
                </div>
              </div>
            </article>

            <article class="quest-card">
              <div class="quest-content">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/8241250b45c7b283edcb99706b81fbabd2e1f629e7e8306e7a0db2658c4093c2?placeholderIfAbsent=true"
                  class="quest-image"
                  alt="Silent Hill"
                />
                <span class="quest-category">хоррор</span>
                <h3 class="quest-title">Silent Hill</h3>
                <div class="quest-details">
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/59394406d1129c504c893bec9f8cb4494ec03a295abf8bdb19a6dafd7c0a70d1?placeholderIfAbsent=true"
                    class="quest-icon"
                    alt="Quest details"
                  />
                  <span class="quest-duration">80 минут</span>
                  <span class="quest-players">2-6 игроков</span>
                  <span class="quest-age">12+</span>
                </div>
              </div>
            </article>

            <article class="quest-card">
              <div class="quest-content">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/689d5f6902d76cc35ac7878430cb01e4b7bd4ff86c0ddf412bd88a976d4a4e0f?placeholderIfAbsent=true"
                  class="quest-image"
                  alt="Секретный эксперимент"
                />
                <span class="quest-category">Дет��ктив</span>
                <h3 class="quest-title">Секретный эксперимент</h3>
                <div class="quest-details">
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/b6f49e27748511b46351eb8b9d32ab53b113748d617e46a7d8802d455705f932?placeholderIfAbsent=true"
                    class="quest-icon"
                    alt="Quest details"
                  />
                  <span class="quest-duration">60 минут</span>
                  <span class="quest-players">2-6 игроков</span>
                  <span class="quest-age">12+</span>
                </div>
              </div>
            </article>

            <article class="quest-card">
              <div class="quest-content">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/a29d66e1c9e680617c01087a6ec11eeaf9db5e1acf390a0d13284f171777fd3d?placeholderIfAbsent=true"
                  class="quest-image"
                  alt="Тайна старого театра"
                />
                <span class="quest-category">Мистический</span>
                <h3 class="quest-title">Тайна старого театра</h3>
                <div class="quest-details">
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/ff24b40af72ed539cba7f863fb79d4c02415a310ca6b1e265a436ba4e2b81846?placeholderIfAbsent=true"
                    class="quest-icon"
                    alt="Quest details"
                  />
                  <span class="quest-duration">80 минут</span>
                  <span class="quest-players">2-6 игроков</span>
                  <span class="quest-age">12+</span>
                </div>
              </div>
            </article>

            <article class="quest-card">
              <div class="quest-content">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/08c3b9f26247606b3e85b9f74ddfa940640187105712490aee1c283f630bc9f8?placeholderIfAbsent=true"
                  class="quest-image"
                  alt="Охотники за привидениями"
                />
                <span class="quest-category">Мистический</span>
                <h3 class="quest-title">Охотники за привидениями</h3>
                <div class="quest-details">
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/59394406d1129c504c893bec9f8cb4494ec03a295abf8bdb19a6dafd7c0a70d1?placeholderIfAbsent=true"
                    class="quest-icon"
                    alt="Quest details"
                  />
                </div>
              </div>
            </article>
          </div>
        </section>

        <section class="quests-section">
          <h2 class="section-title">Квесты для детей во Владивостоке</h2>
          <div class="quests-grid">
            <article class="quest-card">
              <div class="quest-content">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/3143cbd941e6ee26a380ccfa76c109c70966c62b1facc87bbc28b8f0b6fe7f46?placeholderIfAbsent=true"
                  class="quest-image"
                  alt="Лазертаг"
                />
                <span class="quest-category">Экшн</span>
                <h3 class="quest-title">Лазертаг</h3>
                <div class="quest-details">
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/b6f49e27748511b46351eb8b9d32ab53b113748d617e46a7d8802d455705f932?placeholderIfAbsent=true"
                    class="quest-icon"
                    alt="Quest details"
                  />
                  <span class="quest-duration">60 минут</span>
                  <span class="quest-players">до 14 игроков</span>
                  <span class="quest-age">12+</span>
                </div>
              </div>
            </article>

            <article class="quest-card">
              <div class="quest-content">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/7adf693a847cdf1e81e01203aae57a28ede12d942b79a8008d982efe6dc36675?placeholderIfAbsent=true"
                  class="quest-image"
                  alt="Ограбление века"
                />
                <span class="quest-category">Экшн</span>
                <h3 class="quest-title">Ограбление века</h3>
                <div class="quest-details">
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/89d67a76be353d682a5218434cff9755de55386721e886fcd763683a9e6488f9?placeholderIfAbsent=true"
                    class="quest-icon"
                    alt="Quest details"
                  />
                  <span class="quest-duration">60 минут</span>
                  <span class="quest-players">2-6 игроков</span>
                  <span class="quest-age">6+</span>
                </div>
              </div>
            </article>

            <article class="promo-card">
              <div class="promo-content">
                <h3 class="promo-title">
                  Игровая и кафе
                  <br />
                  для вашего ребенка
                </h3>
                <div class="promo-details">
                  <p class="promo-text">
                    Проведите этот день максимально весело.
                    <br />
                    Отдохните после квеста в наших кафе
                    <br />
                    и игровой
                  </p>
                  <a href="#book-table" class="promo-button"
                    >Забронировать столик</a
                  >
                </div>
              </div>
            </article>

            <article class="quest-card">
              <div class="quest-content">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/a29d66e1c9e680617c01087a6ec11eeaf9db5e1acf390a0d13284f171777fd3d?placeholderIfAbsent=true"
                  class="quest-image"
                  alt="Вий"
                />
                <span class="quest-category">хоррор</span>
                <h3 class="quest-title">Вий</h3>
                <div class="quest-details">
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/89d67a76be353d682a5218434cff9755de55386721e886fcd763683a9e6488f9?placeholderIfAbsent=true"
                    class="quest-icon"
                    alt="Quest details"
                  />
                  <span class="quest-duration">60 минут</span>
                  <span class="quest-players">2-6 игроков</span>
                  <span class="quest-age">12+</span>
                </div>
              </div>
            </article>

            <article class="quest-card">
              <div class="quest-content">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/1ade09354fce2f594b056f835a103baafd4e3f1812ae78516d3c6521a00626b1?placeholderIfAbsent=true"
                  class="quest-image"
                  alt="Джуманджи"
                />
                <span class="quest-category">хоррор</span>
                <h3 class="quest-title">Джуманджи</h3>
                <div class="quest-details">
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/59394406d1129c504c893bec9f8cb4494ec03a295abf8bdb19a6dafd7c0a70d1?placeholderIfAbsent=true"
                    class="quest-icon"
                    alt="Quest details"
                  />
                </div>
              </div>
            </article>
          </div>
        </section>

        <section class="news-section" id="news">
          <h2 class="section-title">Новости и акции</h2>
          <div class="news-grid">
            <article class="news-card">
              <img
                src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/4305c1708dbdf7fca93f843be3238d4ac82954505dc24175e5390d95e520979a?placeholderIfAbsent=true"
                class="news-image"
                alt="День рождения в квесте"
              />
              <div class="news-content">
                <div class="news-header">
                  <time class="news-date">25 августа 2024</time>
                  <h3 class="news-title">День рождения в квесте</h3>
                </div>
                <p class="news-text">
                  Праздник в квесте — это такой праздник, который останется в
                  памяти навсегда у вас и вашего ребенка! Хватит скучных
                  сценариев ...
                </p>
                <a href="#read-more" class="read-more">подробнее</a>
              </div>
            </article>

            <article class="news-card">
              <img
                src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/d8bb86c88ed9057634833eec04992a8d75140976ef4fb4ecc423e1496e75d5d9?placeholderIfAbsent=true"
                class="news-image"
                alt="Новый квест — Мумия"
              />
              <div class="news-content">
                <div class="news-header">
                  <time class="news-date">21 июня 2024</time>
                  <h3 class="news-title">Новый квест — Мумия</h3>
                </div>
                <p class="news-text">
                  А мы уже готовим к открытию новый квест🔥🔥🔥 "Группа
                  археологов при раскопках нашла в��од в гробницу, где в начале
                  пути ...
                </p>
                <a href="#read-more" class="read-more">подробнее</a>
              </div>
            </article>

            <article class="news-card">
              <img
                src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/150c45a58fc6822a6e18049d2eb241934c96813d9facb9eac309add7ff21fdcd?placeholderIfAbsent=true"
                class="news-image"
                alt="Скидка 30% на «Тайна Теслы»"
              />
              <div class="news-content">
                <div class="news-header">
                  <time class="news-date">11 июня 2024</time>
                  <h3 class="news-title">Скидка 30% на «Тайна Теслы»</h3>
                </div>
                <p class="news-text">
                  Только на этой неделе у вас есть последняя возможность пройти
                  квест «Тайна Теслы» со скидкой 30%🔥🔥🔥...
                </p>
                <a href="#read-more" class="read-more">подробнее</a>
              </div>
            </article>

            <article class="news-card">
              <img
                src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/cf6fd94ceff476cbc99b8ae2d58213c8f3c3105e05b26e44859a138abf6823d0?placeholderIfAbsent=true"
                class="news-image"
                alt="Дарим квест весь май"
              />
              <div class="news-content">
                <div class="news-header">
                  <time class="news-date">13 мая 2024</time>
                  <h3 class="news-title">Дарим квест весь май</h3>
                </div>
                <p class="news-text">
                  Продляем акцию! На День Рождения принято дарить
                  подарки💛PANDOROOM дарит квест «Тайна Теслы» при бронировании
                  праздника в мае ...
                </p>
                <a href="#read-more" class="read-more">подробнее</a>
              </div>
            </article>
          </div>
        </section>
      </main>

      <section class="reviews-section">
        <img
          src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/75943deecc6258316c9b611f2f2ddbabe8215ce530f46869cbf9194a7524675a?placeholderIfAbsent=true"
          class="reviews-bg"
          alt="Background"
        />
        <h2 class="section-title">Отзывы гостей</h2>
        <div class="reviews-grid">
          <article class="review-card">
            <div class="review-content">
              <div class="review-header">
                <div class="reviewer-info">
                  <h3 class="reviewer-name">Кристина</h3>
                  <time class="review-date">12 августа 2024</time>
                </div>
                <div class="rating">
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/3be351afbe9298a8f0f7326b8b8a2bb823027da84a26c2e06a0ae4c1c8b40adc?placeholderIfAbsent=true"
                    class="star"
                    alt="Star"
                  />
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/3be351afbe9298a8f0f7326b8b8a2bb823027da84a26c2e06a0ae4c1c8b40adc?placeholderIfAbsent=true"
                    class="star"
                    alt="Star"
                  />
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/3be351afbe9298a8f0f7326b8b8a2bb823027da84a26c2e06a0ae4c1c8b40adc?placeholderIfAbsent=true"
                    class="star"
                    alt="Star"
                  />
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/3be351afbe9298a8f0f7326b8b8a2bb823027da84a26c2e06a0ae4c1c8b40adc?placeholderIfAbsent=true"
                    class="star"
                    alt="Star"
                  />
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/3be351afbe9298a8f0f7326b8b8a2bb823027da84a26c2e06a0ae4c1c8b40adc?placeholderIfAbsent=true"
                    class="star"
                    alt="Star"
                  />
                </div>
              </div>
              <p class="review-text">
                Вот уже много лет отмечаем ребёнку здесь день рождение. Это
                наверное единственное место в городе, где можно классно провести
                время. Спасибо вам большое.
              </p>
            </div>
          </article>

          <article class="review-card">
            <div class="review-content">
              <div class="review-header">
                <div class="reviewer-info">
                  <h3 class="reviewer-name">Пелагея Ганчинова</h3>
                  <time class="review-date">9 августа 2024</time>
                </div>
                <div class="rating">
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/3be351afbe9298a8f0f7326b8b8a2bb823027da84a26c2e06a0ae4c1c8b40adc?placeholderIfAbsent=true"
                    class="star"
                    alt="Star"
                  />
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/3be351afbe9298a8f0f7326b8b8a2bb823027da84a26c2e06a0ae4c1c8b40adc?placeholderIfAbsent=true"
                    class="star"
                    alt="Star"
                  />
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/3be351afbe9298a8f0f7326b8b8a2bb823027da84a26c2e06a0ae4c1c8b40adc?placeholderIfAbsent=true"
                    class="star"
                    alt="Star"
                  />
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/3be351afbe9298a8f0f7326b8b8a2bb823027da84a26c2e06a0ae4c1c8b40adc?placeholderIfAbsent=true"
                    class="star"
                    alt="Star"
                  />
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/3be351afbe9298a8f0f7326b8b8a2bb823027da84a26c2e06a0ae4c1c8b40adc?placeholderIfAbsent=true"
                    class="star"
                    alt="Star"
                  />
                </div>
              </div>
              <p class="review-text">
                Были в данном заведении , все было супер . Сильно хочу отметить
                официанта Ивана , приятный , вежливый, может посоветовать блюда
                , официант Ирина так же очень открытая и позитивная .🥰
              </p>
            </div>
          </article>

          <article class="review-card">
            <div class="review-content">
              <div class="review-header">
                <div class="reviewer-info">
                  <h3 class="reviewer-name">Роксолана Скрипка</h3>
                  <time class="review-date">9 августа 2024</time>
                </div>
                <div class="rating">
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/3be351afbe9298a8f0f7326b8b8a2bb823027da84a26c2e06a0ae4c1c8b40adc?placeholderIfAbsent=true"
                    class="star"
                    alt="Star"
                  />
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/3be351afbe9298a8f0f7326b8b8a2bb823027da84a26c2e06a0ae4c1c8b40adc?placeholderIfAbsent=true"
                    class="star"
                    alt="Star"
                  />
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/3be351afbe9298a8f0f7326b8b8a2bb823027da84a26c2e06a0ae4c1c8b40adc?placeholderIfAbsent=true"
                    class="star"
                    alt="Star"
                  />
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/3be351afbe9298a8f0f7326b8b8a2bb823027da84a26c2e06a0ae4c1c8b40adc?placeholderIfAbsent=true"
                    class="star"
                    alt="Star"
                  />
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/3be351afbe9298a8f0f7326b8b8a2bb823027da84a26c2e06a0ae4c1c8b40adc?placeholderIfAbsent=true"
                    class="star"
                    alt="Star"
                  />
                </div>
              </div>
              <p class="review-text">
                Отличное место для времяпровождения с друзьями, семьей или со
                своей половинкой) Очень много игр на выбор. Отличная кухня и
                разнообразный бар🍷 Иван очень вежливый официант, всег<span
                  class="underline"
                  >...</span
                >
              </p>
            </div>
          </article>

          <article class="review-card">
            <div class="review-content">
              <div class="review-header">
                <div class="reviewer-info">
                  <h3 class="reviewer-name">​Карина Белослюдцева</h3>
                  <time class="review-date">9 августа 2024</time>
                </div>
                <div class="rating">
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/3be351afbe9298a8f0f7326b8b8a2bb823027da84a26c2e06a0ae4c1c8b40adc?placeholderIfAbsent=true"
                    class="star"
                    alt="Star"
                  />
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/3be351afbe9298a8f0f7326b8b8a2bb823027da84a26c2e06a0ae4c1c8b40adc?placeholderIfAbsent=true"
                    class="star"
                    alt="Star"
                  />
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/3be351afbe9298a8f0f7326b8b8a2bb823027da84a26c2e06a0ae4c1c8b40adc?placeholderIfAbsent=true"
                    class="star"
                    alt="Star"
                  />
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/3be351afbe9298a8f0f7326b8b8a2bb823027da84a26c2e06a0ae4c1c8b40adc?placeholderIfAbsent=true"
                    class="star"
                    alt="Star"
                  />
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/3be351afbe9298a8f0f7326b8b8a2bb823027da84a26c2e06a0ae4c1c8b40adc?placeholderIfAbsent=true"
                    class="star"
                    alt="Star"
                  />
                </div>
              </div>
              <p class="review-text">
                Спасибо большое за хорошо проведённый вечер! Отличный персонал,
                официант Иван очень внимательный и вежливый, также официант
                Ирина очень открытая и позитивная. Настроение на выс<span
                  class="underline"
                  >...</span
                >
              </p>
            </div>
          </article>

          <article class="review-card">
            <div class="review-content">
              <div class="review-header">
                <div class="reviewer-info">
                  <h3 class="reviewer-name">Снежана</h3>
                </div>
                <div class="rating">
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/3be351afbe9298a8f0f7326b8b8a2bb823027da84a26c2e06a0ae4c1c8b40adc?placeholderIfAbsent=true"
                    class="star"
                    alt="Star"
                  />
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/6e78282978155c27d16c4d0d45a5b973bb88931da6e8d76f49af17d59e3a8155?placeholderIfAbsent=true"
                    class="star"
                    alt="Star"
                  />
                </div>
              </div>
              <p class="review-text">
                Были на квесте "Властелин колец". Квест интересный, сложность
                средняя, есть бесконечное число подсказок)) Квест проходить
                интересно и весело. На память бесплатно сделали фото и даже
              </p>
            </div>
          </article>
        </div>
      </section>

      <footer class="footer">
        <div class="footer-divider"></div>
        <div class="footer-content">
          <div class="footer-main">
            <div class="footer-columns">
              <div class="footer-column">
                <h3 class="footer-title">Квесты во Владивостоке</h3>
                <div class="footer-links-grid">
                  <div class="footer-links-column">
                    <a href="#all-quests" class="footer-link">Все квесты</a>
                    <a href="#actor-quests" class="footer-link"
                      >Квесты с актерами</a
                    >
                    <a href="#no-actor-quests" class="footer-link"
                      >Квесты без актеров</a
                    >
                    <a href="#kids-quests" class="footer-link"
                      >Детские квесты</a
                    >
                    <a href="#adventure-quests" class="footer-link"
                      >Квесты-приключения</a
                    >
                  </div>
                  <div class="footer-links-column">
                    <a href="#action-quests" class="footer-link"
                      >Квесты-экшены</a
                    >
                    <a href="#mystic-quests" class="footer-link"
                      >Мистические квесты</a
                    >
                    <a href="#horror-quests" class="footer-link"
                      >Квесты-хорроры</a
                    >
                    <a href="#detective-quests" class="footer-link"
                      >Квесты-детективы</a
                    >
                  </div>
                </div>
              </div>

              <div class="footer-column">
                <h3 class="footer-title">Праздники во Владивостоке</h3>
                <div class="footer-links">
                  <a href="#kids-party" class="footer-link"
                    >Праздник для малышей</a
                  >
                  <a href="#kids-6-10-party" class="footer-link"
                    >Праздник для детей 6-10 лет</a
                  >
                  <a href="#kids-10-15-party" class="footer-link"
                    >Праздник для детей 10-15 лет</a
                  >
                  <a href="#custom-party" class="footer-link">
                    <br />
                    Индивидуальный расчет праздника
                  </a>
                </div>
              </div>

              <div class="footer-column">
                <h3 class="footer-title">Семейный центр Пандорум</h3>
                <div class="footer-links-flex">
                  <div class="footer-links-group">
                    <a href="#about" class="footer-link">О центре</a>
                    <a href="#cafe" class="footer-link">Кафе</a>
                    <a href="#playroom" class="footer-link">Игровая</a>
                    <a href="#menu" class="footer-link">Меню</a>
                    <a href="#rules" class="footer-link">Правила</a>
                  </div>
                  <div class="footer-links-group">
                    <a href="#loyalty" class="footer-link"
                      >Программа лояльности</a
                    >
                    <a href="#news" class="footer-link">Акции и новости</a>
                    <a href="#contacts" class="footer-link">Контакты</a>
                  </div>
                </div>
              </div>
            </div>

            <img
              src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/4a01fe9b22c5541dffc45c64015229105bca8a29e6ef4a5f597f441a633ea683?placeholderIfAbsent=true"
              class="footer-logo"
              alt="Pandoroom logo"
            />

            <div class="footer-description">
              <p class="company-description">
                Семейное кафе и квесты Pandoroom (Пандорум) – это огромный центр
                отдыха для семьи, компаний друзей и детей. В наших филиалах Вас
                ждет: три зала фирменного кафе, огромный мир квестов для всех
                возрастов, а также, получившая популярность, батальная игра для
                детей и взрослых – Лазертаг.
              </p>
              <div class="footer-contacts">
                <div class="footer-location">
                  <p class="footer-address">
                    Нижнепортовая, 1 / Посьетская, 27 стр. 2
                  </p>
                  <p class="footer-phone">8 423 202 26 96</p>
                </div>
                <div class="footer-location">
                  <p class="footer-address">Алеутская 17а</p>
                  <p class="footer-phone">8 423 205 44 58</p>
                </div>
              </div>
            </div>

            <div class="footer-bottom">
              <p class="copyright">
                2015 — 2024 | ООО «Пандорум» |
                <a href="#privacy" class="privacy-link"
                  >Политика конфиденциальности</a
                >
              </p>
              <div class="social-links">
                <p class="social-text">следите за нами в соц.сетях —</p>
                <div class="social-icons">
                  <a href="#social1"
                    ><img
                      src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/6c9f0706a83d1fe80b314a35b1ceaaeaca2674f70346cb9915aa1455a23d764f?placeholderIfAbsent=true"
                      class="social-icon"
                      alt="Social media"
                  /></a>
                  <a href="#social2"
                    ><img
                      src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/c0c60a621a93c28120c9ac67aa10f18a226ab684c471a1389f50d3edbdff5b38?placeholderIfAbsent=true"
                      class="social-icon"
                      alt="Social media"
                  /></a>
                  <a href="#social3"
                    ><img
                      src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/307392289e244f49393811c04bfc55fbaec907879463d2f862995eb832a5572b?placeholderIfAbsent=true"
                      class="social-icon"
                      alt="Social media"
                  /></a>
                </div>
              </div>
            </div>
          </div>

          <div class="credits">
            <div class="credit-item">
              <p class="credit-label">Разработка сайта —</p>
              <p class="credit-name">Shelikhov.me</p>
            </div>
            <div class="credit-item">
              <p class="credit-label">Дизайн сайта —</p>
              <p class="credit-name">
                Дизайн
                <br />
                Маркетинг
                <br />
                Контент
              </p>
            </div>
          </div>
        </div>
      </footer>
    </div>

    <script>
      (() => {
        const state = {};

        let context = null;
        let nodesToDestroy = [];
        let pendingUpdate = false;

        function destroyAnyNodes() {
          // destroy current view template refs before rendering again
          nodesToDestroy.forEach((el) => el.remove());
          nodesToDestroy = [];
        }

        // Function to update data bindings and loops
        // call update() when you mutate state and need the updates to reflect
        // in the dom
        function update() {
          if (pendingUpdate === true) {
            return;
          }
          pendingUpdate = true;

          document.querySelectorAll("[data-el='div-1']").forEach((el) => {
            el.setAttribute("space", 46);
          });

          document.querySelectorAll("[data-el='div-2']").forEach((el) => {
            el.setAttribute("space", 132);
          });

          document.querySelectorAll("[data-el='div-3']").forEach((el) => {
            el.setAttribute("space", 42);
          });

          destroyAnyNodes();

          pendingUpdate = false;
        }

        // Update with initial state on first load
        update();
      })();
    </script>
	<style>


@font-face {
	font-family: 'Actay Wide';
	src: url('../fonts/actaywide-bold.eot'); /* IE 9 Compatibility Mode */
	src: url('../fonts/actaywide-bold.eot?#iefix') format('embedded-opentype'), /* IE < 9 */
		url('../fonts/actaywide-bold.woff2') format('woff2'), /* Super Modern Browsers */
		url('../fonts/actaywide-bold.woff') format('woff'), /* Firefox >= 3.6, any other modern browser */
		url('../fonts/actaywide-bold.ttf') format('truetype'), /* Safari, Android, iOS */
		url('../fonts/actaywide-bold.svg#actaywide-bold') format('svg'); /* Chrome < 4, Legacy iOS */
}
@font-face {
	font-family: 'Manrope';
	src: url('../fonts/manrope_light.eot'); /* IE 9 Compatibility Mode */
	src: url('../fonts/manrope_light.eot?#iefix') format('embedded-opentype'), /* IE < 9 */
		url('../fonts/manrope_light.woff2') format('woff2'), /* Super Modern Browsers */
		url('../fonts/manrope_light.woff') format('woff'), /* Firefox >= 3.6, any other modern browser */
		url('../fonts/manrope_light.ttf') format('truetype'), /* Safari, Android, iOS */
		url('../fonts/manrope_light.svg#manrope_light') format('svg'); /* Chrome < 4, Legacy iOS */
}
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  background-color: rgba(24, 24, 24, 1);
  font-family:
    Manrope,
    -apple-system,
    Roboto,
    Helvetica,
    sans-serif;
  color: #fff;
  overflow-x: hidden;
}

.page-wrapper {
  display: flex;
  flex-direction: column;
  overflow: hidden;
  width: 100%;
}

/* Header and Navigation */
.top-bar {
  background-color: rgba(0, 0, 0, 1);
  width: 100%;
  padding: 10px 70px;
  display: flex;
  justify-content: flex-end;
}

.secondary-nav {
  display: flex;
  align-items: center;
  gap: 50px;
  flex-wrap: wrap;
}

.nav-link {
  color: rgba(126, 126, 126, 1);
  font-size: 16px;
  font-weight: 500;
  line-height: 31px;
  text-decoration: none;
}

.nav-link:hover {
  color: #fff;
}

.main-content {
  z-index: 10;
  display: flex;
 
  width: 100%;
  padding-left: 50px;
  flex-direction: column;
}

.header-section {
  width: 100%;
}

.header-container {
  display: flex;
  width: 100%;
  max-width: 1827px;
  align-items: stretch;
  gap: 20px;
  color: #fff;
  flex-wrap: wrap;
  justify-content: space-between;
}

.logo {
  aspect-ratio: 7.87;
  object-fit: contain;
  object-position: center;
  width: 220px;
  align-self: flex-end;
  margin-top: 21px;
  flex-shrink: 0;
  max-width: 100%;
}

.header-right {
  display: flex;
  align-items: stretch;
  gap: 100px;
  flex-wrap: wrap;
}

.main-nav {
  align-self: flex-end;
  display: flex;
  margin-top: 21px;
  align-items: center;
  gap: 60px;
  font-family:
    "Actay Wide",
    -apple-system,
    Roboto,
    Helvetica,
    sans-serif;
  font-size: 21px;
  font-weight: 700;
  line-height: 1;
  flex-wrap: wrap;
}

.search-icon {
  aspect-ratio: 1;
  object-fit: contain;
  object-position: center;
  width: 20px;
  align-self: stretch;
  margin-top: auto;
  margin-bottom: auto;
  flex-shrink: 0;
}

.contact-info {
  display: flex;
  align-items: flex-start;
  gap: 50px;
  text-align: right;
  flex-wrap: wrap;
}

.location-block {
  display: flex;
  min-width: 240px;
  flex-direction: column;
  align-items: stretch;
  justify-content: flex-start;
}

.address {
  font-size: 14px;
  font-weight: 400;
  text-align: right;
}

.phone {
  font-size: 21px;
  font-family:
    "Actay Wide",
    -apple-system,
    Roboto,
    Helvetica,
    sans-serif;
  font-weight: 700;
  margin-top: 8px;
}

.hero-title {
  color: #fff;
  font-size: 64px;
  font-family:
    "Actay Wide",
    -apple-system,
    Roboto,
    Helvetica,
    sans-serif;
  font-weight: 700;
  line-height: 78px;
  margin-top: 140px;
  margin-left: 153px;
  width: 1093px;
}

.highlight-underline {
  text-decoration: underline;
  color: rgba(140, 182, 0, 1);
}

.cta-buttons {
  display: flex;
  margin-top: 27px;
  margin-left: 152px;
  align-items: center;
  gap: 30px;
  font-family:
    "Actay Wide",
    -apple-system,
    Roboto,
    Helvetica,
    sans-serif;
  font-size: 21px;
  color: #fff;
  font-weight: 700;
  line-height: 36px;
  flex-wrap: wrap;
}

.cta-button {
  border-radius: 50px;
  background-color: #b6009d;
  min-width: 240px;
  padding: 10px 30px;
  color: #fff;
  text-decoration: none;
  text-align: center;
}

.feature-list {
  margin-top: 100px;
  margin-left: 152px;
  font-family:
    Manrope,
    -apple-system,
    Roboto,
    Helvetica,
    sans-serif;
  font-size: 24px;
  color: rgba(190, 190, 190, 1);
  font-weight: 400;
  list-style-type: none;
}

.feature-list li {
  margin-top: 10px;
}

.feature-list li:first-child {
  margin-top: 0;
}

.highlight-text {
  color: rgba(140, 182, 0, 1);
  font-family:
    Manrope,
    -apple-system,
    Roboto,
    Helvetica,
    sans-serif;
  text-decoration: underline;
}

.section-title {
  color: #fff;
  font-size: 44px;
  font-family:
    "Actay Wide",
    -apple-system,
    Roboto,
    Helvetica,
    sans-serif;
  font-weight: 700;
  line-height: 56px;
  margin-top: 150px;
  margin-left: 152px;
}

/* Party Options Section */
.party-options {
  align-self: center;
  margin-top: 100px;
  width: 100%;
  max-width: 1516px;
}

.party-grid {
  display: flex;
  gap: 20px;
}

.party-column {
  display: flex;
  flex-direction: column;
  align-items: stretch;
  width: 33%;
}

.party-card {
  display: flex;
  flex-direction: column;
  border-radius: 20px;
  position: relative;
  min-height: 673px;
  width: 100%;
  padding: 49px 50px;
  margin-bottom: 46px;
  overflow: hidden;
}

.party-image {
  position: absolute;
  inset: 0;
  height: 100%;
  width: 100%;
  object-fit: cover;
  object-position: center;
}

.party-content {
  position: relative;
  display: flex;
  flex-direction: column;
  height: 100%;
  justify-content: space-between;
}

.party-title {
  color: #fff;
  font-size: 44px;
  font-family:
    "Actay Wide",
    -apple-system,
    Roboto,
    Helvetica,
    sans-serif;
  font-weight: 700;
  line-height: 54px;
}

.subtitle {
  font-size: 28px;
  line-height: 34px;
  color: rgba(152, 152, 152, 1);
}

.details-button {
  align-self: flex-start;
  border-radius: 50px;
  background-color: rgba(140, 182, 0, 1);
  padding: 10px 20px;
  font-size: 21px;
  font-family:
    "Actay Wide",
    -apple-system,
    Roboto,
    Helvetica,
    sans-serif;
  color: #000;
  font-weight: 700;
  line-height: 1;
  text-decoration: none;
  margin-top: auto;
}

/* Services Section */
.services-section {
  align-self: center;
  margin-top: 114px;
  width: 100%;
  max-width: 1416px;
}

.services-intro {
  color: #fff;
  font-size: 18px;
  font-family:
    Manrope,
    -apple-system,
    Roboto,
    Helvetica,
    sans-serif;
  font-weight: 400;
  line-height: 1;
  text-align: center;
}

.services-list {
  display: flex;
  margin-top: 50px;
  width: 100%;
  align-items: center;
  gap: 113px;
  font-family:
    "Actay Wide",
    -apple-system,
    Roboto,
    Helvetica,
    sans-serif;
  font-size: 21px;
  color: #fff;
  font-weight: 700;
  line-height: 1;
  flex-wrap: wrap;
  justify-content: flex-start;
}

.service-item {
  text-align: center;
  flex-grow: 1;
  flex-shrink: 1;
}

/* Quests Section */
.quests-section {
  align-self: flex-end;
  margin-top: 150px;
  width: 100%;
  max-width: 1718px;
}

.quests-section .section-title {
  border-radius: 0;
  width: 928px;
  max-width: 100%;
  padding-bottom: 10px;
  font-family:
    "Actay Wide",
    -apple-system,
    Roboto,
    Helvetica,
    sans-serif;
  font-size: 44px;
  color: #fff;
  font-weight: 700;
  line-height: 2;
  margin-left: 0;
}

.quests-grid {
  display: flex;
  margin-top: 50px;
  width: 100%;
  align-items: flex-start;
  gap: 45px;
  flex-wrap: wrap;
}

.quest-card {
  border-radius: 0;
  min-width: 240px;
  padding-bottom: 50px;
  font-family:
    Manrope,
    -apple-system,
    Roboto,
    Helvetica,
    sans-serif;
  color: #fff;
  font-weight: 400;
  width: 360px;
}

.quest-content {
  display: flex;
  flex-direction: column;
  border-radius: 20px;
  position: relative;
  aspect-ratio: 0.72;
  min-height: 500px;
  width: 100%;
  padding: 30px 20px;
  padding-top: 373px;
  align-items: stretch;
  justify-content: flex-end;
  overflow: hidden;
}

.quest-image {
  position: absolute;
  inset: 0;
  height: 100%;
  width: 100%;
  object-fit: cover;
  object-position: center;
}

.quest-category {
  position: relative;
  align-self: flex-start;
  border-radius: 5px;
  background-color: rgba(182, 0, 157, 1);
  padding: 5px 10px;
  font-size: 16px;
  line-height: 1;
}

.quest-title {
  position: relative;
  font-size: 24px;
  font-family:
    Manrope,
    -apple-system,
    Roboto,
    Helvetica,
    sans-serif;
  margin-top: 12px;
  font-weight: normal;
}

.quest-details {
  position: relative;
  display: flex;
  margin-top: 12px;
  align-items: center;
  gap: 30px;
  font-size: 14px;
  color: #fff;
}

.quest-icon {
  aspect-ratio: 3.14;
  object-fit: contain;
  object-position: center;
  width: 66px;
  align-self: stretch;
  margin-top: auto;
  margin-bottom: auto;
  flex-shrink: 0;
}

.quest-duration,
.quest-players,
.quest-age {
  align-self: stretch;
  margin-top: auto;
  margin-bottom: auto;
}

/* Promo Card */
.promo-card {
  display: flex;
  min-width: 240px;
  min-height: 500px;
  width: 360px;
}

.promo-content {
  display: flex;
  min-width: 240px;
  min-height: 498px;
  width: 360px;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

.promo-title {
  width: 100%;
  font-family:
    "Actay Wide",
    -apple-system,
    Roboto,
    Helvetica,
    sans-serif;
  font-size: 28px;
  color: #fff;
  font-weight: 700;
  text-align: center;
  line-height: 36px;
}

.promo-details {
  display: flex;
  margin-top: 10px;
  width: 100%;
  max-width: 360px;
  flex-direction: column;
  align-items: center;
}

.promo-text {
  color: #fff;
  font-size: 16px;
  font-family:
    Manrope,
    -apple-system,
    Roboto,
    Helvetica,
    sans-serif;
  font-weight: 400;
  line-height: 24px;
  text-align: center;
}

.promo-button {
  align-self: stretch;
  border-radius: 50px;
  background-color: rgba(140, 182, 0, 1);
  margin-top: 30px;
  padding: 10px 30px;
  font-family:
    "Actay Wide",
    -apple-system,
    Roboto,
    Helvetica,
    sans-serif;
  font-size: 21px;
  color: #000;
  font-weight: 700;
  line-height: 36px;
  text-decoration: none;
  text-align: center;
}

/* News Section */
.news-section {
  align-self: flex-end;
  margin-top: 110px;
  width: 100%;
  max-width: 1718px;
}

.news-section .section-title {
  color: #fff;
  font-size: 44px;
  font-family:
    "Actay Wide",
    -apple-system,
    Roboto,
    Helvetica,
    sans-serif;
  font-weight: 700;
  line-height: 1;
  margin-left: 0;
}

.news-grid {
  display: flex;
  margin-top: 50px;
  width: 100%;
  align-items: flex-start;
  gap: 53px;
  font-family:
    Manrope,
    -apple-system,
    Roboto,
    Helvetica,
    sans-serif;
  flex-wrap: wrap;
}

.news-card {
  min-width: 240px;
  flex-grow: 1;
  flex-shrink: 1;
  width: 312px;
}

.news-image {
  aspect-ratio: 0.87;
  object-fit: contain;
  object-position: center;
  width: 100%;
  border-radius: 20px;
}

.news-content {
  margin-top: 40px;
  width: 100%;
}

.news-header {
  width: 100%;
}

.news-date {
  color: rgba(148, 148, 148, 1);
  font-size: 16px;
  font-weight: 400;
  display: block;
}

.news-title {
  color: #fff;
  font-size: 24px;
  font-weight: 700;
  line-height: 1;
  margin-top: 5px;
}

.news-text {
  color: #fff;
  font-size: 21px;
  font-weight: 400;
  line-height: 31px;
  margin-top: 21px;
}

.read-more {
  color: rgba(140, 182, 0, 1);
  font-size: 21px;
  font-weight: 400;
  line-height: 1;
  text-decoration: underline;
  margin-top: 21px;
  display: inline-block;
}

/* Reviews Section */
.reviews-section {
  display: flex;
  flex-direction: column;
  position: relative;
  min-height: 961px;
  margin-top: -315px;
  width: 100%;
  padding-left: 80px;
  padding-top: 459px;
  padding-bottom: 76px;
}

.reviews-bg {
  position: absolute;
  inset: 0;
  height: 100%;
  width: 100%;
  object-fit: cover;
  object-position: center;
  z-index: -1;
}

.reviews-section .section-title {
  position: relative;
  color: #fff;
  font-size: 44px;
  font-family:
    "Actay Wide",
    -apple-system,
    Roboto,
    Helvetica,
    sans-serif;
  font-weight: 700;
  line-height: 1;
  align-self: flex-start;
  margin-left: 0;
}

.reviews-grid {
  position: relative;
  align-self: flex-end;
  display: flex;
  margin-top: 50px;
  align-items: flex-start;
  gap: 50px;
  flex-wrap: wrap;
}

.review-card {
  min-width: 240px;
  width: 371px;
}

.review-content {
  width: 100%;
}

.review-header {
  display: flex;
  width: 100%;
  flex-direction: column;
  align-items: flex-start;
}

.reviewer-info {
  display: flex;
  align-items: flex-start;
  gap: 10px;
}

.reviewer-name {
  color: #fff;
  font-size: 21px;
  font-family:
    Manrope,
    -apple-system,
    Roboto,
    Helvetica,
    sans-serif;
  font-weight: 700;
  line-height: 2;
}

.review-date {
  color: rgba(165, 165, 165, 1);
  font-size: 16px;
  font-family:
    Manrope,
    -apple-system,
    Roboto,
    Helvetica,
    sans-serif;
  font-weight: 400;
  line-height: 32px;
}

.rating {
  display: flex;
  margin-top: 10px;
  align-items: center;
  gap: 5px;
}

.star {
  aspect-ratio: 1.05;
  object-fit: contain;
  object-position: center;
  width: 20px;
  align-self: stretch;
  margin-top: auto;
  margin-bottom: auto;
  flex-shrink: 0;
}

.review-text {
  color: #fff;
  font-size: 21px;
  font-family:
    Manrope,
    -apple-system,
    Roboto,
    Helvetica,
    sans-serif;
  font-weight: 400;
  line-height: 32px;
  margin-top: 20px;
}

.underline {
  text-decoration: underline;
}

/* Footer */
.footer {
  align-self: center;
  margin-top: 28px;
  width: 100%;
  max-width: 1516px;
  padding-top: 75px;
}

.footer-divider {
  background-color: rgba(255, 255, 255, 0.1);
  min-height: 2px;
  width: 100%;
}

.footer-content {
  display: flex;
  margin-top: 92px;
  min-height: 709px;
  width: 100%;
  flex-direction: column;
  align-items: stretch;
}

.footer-main {
  width: 100%;
}

.footer-columns {
  display: flex;
  gap: 20px;
}

.footer-column {
  display: flex;
  flex-direction: column;
  align-items: stretch;
  width: 33%;
}

.footer-title {
  color: rgba(78, 78, 78, 1);
  font-size: 21px;
  font-family:
    Manrope,
    -apple-system,
    Roboto,
    Helvetica,
    sans-serif;
  font-weight: 700;
  line-height: 2;
  align-self: flex-start;
}

.footer-links-grid {
  margin-top: 19px;
  display: flex;
  gap: 20px;
}

.footer-links-column {
  display: flex;
  flex-direction: column;
  width: 50%;
}

.footer-links {
  margin-top: 19px;
  display: flex;
  flex-direction: column;
}

.footer-link {
  color: rgba(140, 182, 0, 1);
  font-size: 21px;
  font-family:
    Manrope,
    -apple-system,
    Roboto,
    Helvetica,
    sans-serif;
  font-weight: 400;
  line-height: 2;
  text-decoration: none;
  margin-top: 5px;
}

.footer-link:first-child {
  margin-top: 0;
}

.footer-links-flex {
  display: flex;
  margin-top: 19px;
  align-items: stretch;
  gap: 20px;
  justify-content: space-between;
}

.footer-links-group {
  display: flex;
  flex-direction: column;
}

.footer-logo {
  aspect-ratio: 7.87;
  object-fit: contain;
  object-position: center;
  width: 220px;
  margin-top: 74px;
  max-width: 100%;
}

.footer-description {
  display: flex;
  margin-top: 30px;
  width: 100%;
  align-items: stretch;
  gap: 100px;
  font-family:
    Manrope,
    -apple-system,
    Roboto,
    Helvetica,
    sans-serif;
  font-weight: 400;
  flex-wrap: wrap;
}

.company-description {
  color: rgba(166, 166, 166, 1);
  font-size: 16px;
  line-height: 24px;
  flex-grow: 1;
  flex-shrink: 1;
  width: 666px;
}

.footer-contacts {
  display: flex;
  margin-top: auto;
  margin-bottom: auto;
  align-items: center;
  gap: 50px;
  color: #fff;
  flex-wrap: wrap;
}

.footer-location {
  display: flex;
  min-width: 240px;
  margin-top: auto;
  margin-bottom: auto;
  flex-direction: column;
  align-items: stretch;
  text-align: right;
}

.footer-address {
  font-size: 16px;
  align-self: flex-end;
}

.footer-phone {
  font-size: 26px;
  margin-top: 8px;
}

.footer-bottom {
  display: flex;
  margin-top: 35px;
  width: 100%;
  align-items: stretch;
  gap: 20px;
  flex-wrap: wrap;
  justify-content: space-between;
}

.copyright {
  color: rgba(166, 166, 166, 1);
  font-size: 14px;
  font-family:
    Manrope,
    -apple-system,
    Roboto,
    Helvetica,
    sans-serif;
  font-weight: 400;
  margin-top: auto;
  margin-bottom: auto;
}

.privacy-link {
  text-decoration: underline;
  color: rgba(166, 166, 166, 1);
}

.social-links {
  display: flex;
  align-items: stretch;
  gap: 32px;
}

.social-text {
  color: rgba(166, 166, 166, 1);
  font-size: 14px;
  font-family:
    Manrope,
    -apple-system,
    Roboto,
    Helvetica,
    sans-serif;
  font-weight: 400;
  text-align: right;
  margin-top: auto;
  margin-bottom: auto;
  flex-grow: 1;
}

.social-icons {
  display: flex;
  align-items: center;
  gap: 25px;
}

.social-icon {
  aspect-ratio: 1;
  object-fit: contain;
  object-position: center;
  width: 20px;
  align-self: stretch;
  margin-top: auto;
  margin-bottom: auto;
  flex-shrink: 0;
}

.credits {
  align-self: flex-start;
  display: flex;
  margin-top: 50px;
  align-items: flex-start;
  gap: 50px;
  font-family:
    Rubik,
    -apple-system,
    Roboto,
    Helvetica,
    sans-serif;
}

.credit-item {
  line-height: 1;
  width: 184px;
}

.credit-label {
  color: rgba(66, 66, 66, 1);
  font-size: 12px;
  font-weight: 400;
}

.credit-name {
  color: rgba(83, 83, 83, 1);
  font-size: 28px;
  font-weight: 600;
  margin-top: 10px;
}

/* Media Queries */
@media (max-width: 991px) {
  .top-bar {
    max-width: 100%;
    padding-left: 20px;
    padding-right: 20px;
  }

  .secondary-nav {
    max-width: 100%;
  }

  .main-content {
    max-width: 100%;
    padding-left: 20px;
    margin-top: 40px;
  }

  .header-container {
    max-width: 100%;
  }

  .header-right {
    max-width: 100%;
  }

  .main-nav {
    max-width: 100%;
  }

  .contact-info {
    max-width: 100%;
  }

  .hero-title {
    max-width: 100%;
    margin-top: 40px;
    font-size: 40px;
    line-height: 54px;
  }

  .cta-buttons {
    max-width: 100%;
  }

  .cta-button {
    padding-left: 20px;
    padding-right: 20px;
  }

  .feature-list {
    max-width: 100%;
    margin-top: 40px;
  }

  .section-title {
    max-width: 100%;
    margin-top: 40px;
  }

  .party-options {
    max-width: 100%;
    margin-top: 40px;
  }

  .party-grid {
    flex-direction: column;
    align-items: stretch;
    gap: 0;
  }

  .party-column {
    width: 100%;
    margin-left: 0 !important;
    margin-top: 40px;
  }

  .party-column:first-child {
    margin-top: 0;
  }

  .party-card {
    max-width: 100%;
    padding-left: 20px;
    padding-right: 20px;
  }

  .details-button {
    margin-top: 40px;
    white-space: initial;
  }

  .services-section {
    max-width: 100%;
    margin-top: 40px;
  }

  .services-intro {
    max-width: 100%;
  }

  .services-list {
    max-width: 100%;
    margin-top: 40px;
    white-space: initial;
  }

  .quests-section {
    max-width: 100%;
    margin-top: 40px;
  }

  .quests-section .section-title {
    max-width: 100%;
  }

  .quests-grid {
    max-width: 100%;
    margin-top: 40px;
  }

  .quest-content {
    padding-top: 100px;
  }

  .quest-category {
    white-space: initial;
  }

  .news-section {
    max-width: 100%;
    margin-top: 40px;
  }

  .news-section .section-title {
    max-width: 100%;
  }

  .news-grid {
    max-width: 100%;
    margin-top: 40px;
  }

  .reviews-section {
    max-width: 100%;
    margin-top: -200px;
    padding-left: 20px;
    padding-top: 100px;
  }

  .reviews-grid {
    max-width: 100%;
    margin-top: 40px;
  }

  .reviewer-name {
    white-space: initial;
  }

  .footer {
    max-width: 100%;
  }

  .footer-divider {
    max-width: 100%;
  }

  .footer-content {
    max-width: 100%;
    margin-top: 40px;
  }

  .footer-main {
    max-width: 100%;
  }

  .footer-columns {
    flex-direction: column;
    align-items: stretch;
    gap: 0;
  }

  .footer-column {
    width: 100%;
    margin-left: 0 !important;
    margin-top: 40px;
  }

  .footer-column:first-child {
    margin-top: 0;
  }

  .footer-logo {
    margin-top: 40px;
  }

  .footer-description {
    max-width: 100%;
  }

  .company-description {
    max-width: 100%;
  }

  .footer-contacts {
    max-width: 100%;
  }

  .footer-bottom {
    max-width: 100%;
  }

  .copyright {
    max-width: 100%;
  }

  .credits {
    max-width: 100%;
    margin-top: 40px;
  }

  .credit-name {
    white-space: initial;
    padding-left: 20px;
  }
}
</style>
  </body>
</html>
