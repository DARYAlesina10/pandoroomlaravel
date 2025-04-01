<!doctype html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pandoroom - Личный кабинет</title>
    <link rel="stylesheet" href="styles.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css"
    />
  
  </head>
  <body>
    <header>
      <div class="header-top">
        <div class="header-top-links">
          <a href="#" class="link">О центре</a>
          <a href="#" class="link">Новости и акции</a>
          <a href="#" class="link">Правила</a>
          <a href="#" class="link">Программа лояльности</a>
          <a href="#" class="link">Контакты</a>
        </div>
      </div>
      <div class="header-main">
        <div class="logo">
          <img
            src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/a871df3a351335ba0ca1f8c96010fd6f616ab0f577807a144d4c5068afbef971?placeholderIfAbsent=true"
            alt="Logo"
            class="logo-image"
          />
        </div>
        <nav class="main-nav">
          <a href="#" class="nav-item">Квесты</a>
          <a href="#" class="nav-item">Праздники</a>
          <a href="#" class="nav-item">Кафе</a>
          <div class="nav-item-dropdown">
            <span>Игровая для детей</span>
            <i class="ti ti-chevron-down"></i>
          </div>
        </nav>
        <div class="contact-info">
          <div class="location">
            <span>Нижнепортовая, 1 / Посьетская, 27 стр. 2</span>
            <div class="phone">8 423 202 26 96</div>
          </div>
          <div class="location">
            <span>Алеутская 17а</span>
            <div class="phone">8 423 205 44 58</div>
          </div>
        </div>
      </div>
    </header>

    <nav class="breadcrumb">
      <a href="http://pandoroom/">Главная страница</a>
	  <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit">Выйти</button>
        </form>
    </nav>

    <section class="welcome-section">
      <h2 style="color: #ffffff;">Приветствуем,{{ Auth::user()->name }}</h2>
    </section>

    <section class="slider-section">
      <div class="slider-container">
        <article class="slide">
          <img
            src="https://cdn.builder.io/api/v1/image/assets/TEMP/61116c5ae13889fabd807b6257381d66b8694119"
            alt="Slide 1"
            class="slide-image"
          />
          <div class="slide-content">
            <div class="timer danger">
              осталось: 0 дней / 7 часов / 35 минут
            </div>
            <h2 class="slide-title">Ловушка для Шерлока</h2>
            <div class="slide-category">Квест</div>
          </div>
        </article>
        <article class="slide">
          <img
            src="https://cdn.builder.io/api/v1/image/assets/TEMP/968a6ea7d87a925ad45750a5db97681e0a296fb1"
            alt="Slide 2"
            class="slide-image"
          />
          <div class="slide-content">
            <div class="timer success">
              осталось: 42 дня / 2 часа / 00 минут
            </div>
            <h2 class="slide-title">
              <span>Лимонад в подарок при заказе</span>
              <br />
              <span>Дня рождения на 10 и более гостей</span>
            </h2>
            <div class="slide-category">Бар</div>
          </div>
        </article>
      </div>
    </section>

    <section class="my-events-section">
      <h2 class="section-header">Мои праздники</h2>
      <button class="book-button">Забронировать праздник</button>
    </section>

    <section class="booked-quests-section">
      <h2 class="section-header">Забронированные квесты</h2>
      <div class="quest-cards">
        <article class="quest-card">
          <div class="quest-image quest-image-harry">
            <div class="quest-tag">приключение</div>
            <h3 class="quest-title">
              <span>Гарри Поттер</span>
              <br />
              <span>и Философский камень</span>
            </h3>
            <div class="quest-info">
              <div class="rating">
                <i class="ti ti-star-filled"></i>
                <i class="ti ti-star-filled"></i>
                <i class="ti ti-star-filled"></i>
                <i class="ti ti-star-filled"></i>
              </div>
              <div class="duration">60 минут</div>
              <div class="players">2-6 игроков</div>
              <div class="age">12+</div>
            </div>
          </div>
          <div class="quest-details">
            <div class="date">29.11.2024</div>
            <div class="time">13:10</div>
            <div class="price">6000</div>
            <button class="edit"><i class="ti ti-pencil"></i></button>
          </div>
          <button class="add-animator">Добавить аниматора</button>
        </article>

        <article class="quest-card">
          <div class="quest-image quest-image-plague">
            <div class="quest-tag">мистический</div>
            <h3 class="quest-title">Чумной доктор</h3>
            <div class="quest-info">
              <div class="rating">
                <i class="ti ti-star-filled"></i>
                <i class="ti ti-star-filled"></i>
                <i class="ti ti-star-filled"></i>
                <i class="ti ti-star-filled empty"></i>
              </div>
              <div class="duration">60 минут</div>
              <div class="players">2-6 игроков</div>
              <div class="age">12+</div>
            </div>
          </div>
          <div class="quest-details">
            <div class="date">29.11.2024</div>
            <div class="time">13:10</div>
            <div class="price">6000</div>
            <button class="edit"><i class="ti ti-pencil"></i></button>
          </div>
          <div class="with-animator">С аниматором</div>
        </article>

        <article class="quest-card">
          <div class="quest-image quest-image-pirates">
            <div class="quest-tag">приключение</div>
            <h3 class="quest-title">Сокровища пиратов</h3>
            <div class="quest-info">
              <div class="rating">
                <i class="ti ti-star-filled"></i>
                <i class="ti ti-star-filled"></i>
                <i class="ti ti-star-filled empty"></i>
                <i class="ti ti-star-filled empty"></i>
              </div>
              <div class="duration">60 минут</div>
              <div class="players">2-6 игроков</div>
              <div class="age">12+</div>
            </div>
          </div>
          <div class="quest-details">
            <div class="date">29.11.2024</div>
            <div class="time">13:10</div>
            <div class="price">6000</div>
            <button class="edit"><i class="ti ti-pencil"></i></button>
          </div>
          <button class="add-animator">Добавить аниматора</button>
        </article>

        <article class="quest-card">
          <div class="quest-image quest-image-resident">
            <div class="quest-tag">хоррор</div>
            <h3 class="quest-title">Resident Evil</h3>
            <div class="quest-info">
              <div class="rating">
                <i class="ti ti-star-filled"></i>
                <i class="ti ti-star-filled"></i>
                <i class="ti ti-star-filled"></i>
                <i class="ti ti-star-filled empty"></i>
              </div>
              <div class="duration">80 минут</div>
              <div class="players">2-6 игроков</div>
              <div class="age">12+</div>
            </div>
          </div>
          <div class="quest-details">
            <div class="date">29.11.2024</div>
            <div class="time">13:10</div>
            <div class="price">6000</div>
            <button class="edit"><i class="ti ti-pencil"></i></button>
          </div>
          <div class="with-animator">С аниматором</div>
        </article>
      </div>
    </section>

    <section class="photos-section">
      <h2 class="section-header">Фото с пройденных квестов</h2>
      <p class="subtitle">
        Здесь мы храним воспоминания о ваших пройденных квестах
      </p>
      <div class="photo-grid">
        <article class="photo-card">
          <img
            src="https://cdn.builder.io/api/v1/image/assets/TEMP/0b0e804dd62ce8ee2b30d2ae2638ca83a0fafb28"
            alt="Лара Крофт"
            class="photo-image"
          />
          <div class="photo-info">
            <div class="photo-date">14.04.2024 20:00</div>
            <h3 class="photo-title">Лара Крофт</h3>
          </div>
        </article>
        <article class="photo-card">
          <img
            src="https://cdn.builder.io/api/v1/image/assets/TEMP/5893b5c15871c7e12032e540fa747d26e224e8bf"
            alt="Тайна заброшенного особняка"
            class="photo-image"
          />
          <div class="photo-info">
            <div class="photo-date">1.05.2024 15:00</div>
            <h3 class="photo-title">
              <span>Тайна</span>
              <br />
              <span>заброшенного особняка</span>
            </h3>
          </div>
        </article>
        <article class="photo-card">
          <img
            src="https://cdn.builder.io/api/v1/image/assets/TEMP/bb964661b004b5657649afe1154665ab946dde09"
            alt="Гарри Поттер"
            class="photo-image"
          />
          <div class="photo-info">
            <div class="photo-date">9.05.2024 21:00</div>
            <h3 class="photo-title">
              <span>Гарри Поттер</span>
              <br />
              <span>и Философский камень</span>
            </h3>
          </div>
        </article>
        <article class="photo-card">
          <img
            src="https://cdn.builder.io/api/v1/image/assets/TEMP/141985a3adf844f2a44c55bb072b2419773e8d4f"
            alt="Инквизиция"
            class="photo-image"
          />
          <div class="photo-info">
            <div class="photo-date">10.05.2024 19:00</div>
            <h3 class="photo-title">Инквизиция</h3>
          </div>
        </article>
        <article class="photo-card">
          <img
            src="https://cdn.builder.io/api/v1/image/assets/TEMP/4a1dbfc563ce2468b1e7592a1c87883aa3cfbe83"
            alt="Ограбление века"
            class="photo-image"
          />
          <div class="photo-info">
            <div class="photo-date">20.05.2024 13:00</div>
            <h3 class="photo-title">Ограбление века</h3>
          </div>
        </article>
        <article class="photo-card">
          <img
            src="https://cdn.builder.io/api/v1/image/assets/TEMP/3e1b69f9f8c3228370aa13bcd0d09d80f1bfb5bf"
            alt="Миссия невыполнима"
            class="photo-image"
          />
          <div class="photo-info">
            <div class="photo-date">1.06.2024 15:00</div>
            <h3 class="photo-title">
              <span>Миссия</span>
              <br />
              <span>невыполнима</span>
            </h3>
          </div>
        </article>
      </div>
    </section>

    <section class="promotions-section">
      <h2 class="section-header">Скидки и бонусы</h2>
      <div class="promotion-cards">
        <article class="promotion-card">
          <img
            src="https://cdn.builder.io/api/v1/image/assets/TEMP/adbde70d9a2e1881484dea7789de7aceb0d8ce0f"
            alt="Ловушка для Шерлока"
            class="promotion-image"
          />
          <div class="timer danger">осталось: 0 дней / 7 часов / 35 минут</div>
          <div class="promotion-content">
            <div class="promotion-category">Квест</div>
            <h3 class="promotion-title">Ловушка для Шерлока</h3>
            <p class="promotion-description">
              Вы – Шерлок Холмс и его команда. Вы долгое время выслеживали
              легендарного преступника, профессора Мориарти, и наконец пришли
              схватить его в тайном убежище. Однако, ворвавшись ...
            </p>
            <a href="#" class="more-link">подр��бнее</a>
          </div>
        </article>
        <article class="promotion-card">
          <img
            src="https://cdn.builder.io/api/v1/image/assets/TEMP/240b68ebe1b3a01ac9ca303bc628e9bd273252f1"
            alt="Лимонад в подарок"
            class="promotion-image"
          />
          <div class="timer success">осталось: 42 дня / 2 часа / 00 минут</div>
          <div class="promotion-content">
            <div class="promotion-category">Бар</div>
            <h3 class="promotion-title">
              Лимонад в подарок при заказе Дня рождения на 10 и более гостей
            </h3>
            <p class="promotion-description">
              При бронировании Дня рождения от 10 гостей, мы рады подарить
              вашему столу два литра любого лимонада на выбор...
            </p>
            <a href="#" class="more-link">подробнее</a>
          </div>
        </article>
        <article class="promotion-card">
          <img
            src="https://cdn.builder.io/api/v1/image/assets/TEMP/d783174ae4201960307c2315d1c43b81b5619426"
            alt="Меч Короля Артура"
            class="promotion-image"
          />
          <div class="timer success">
            осталось: 1 день / 12 часов / 00 минут
          </div>
          <div class="promotion-content">
            <div class="promotion-category">Квест</div>
            <h3 class="promotion-title">Меч Короля Артура</h3>
            <p class="promotion-description">
              Наверное, все знают легенду о короле Артуре и его волшебном мече
              Экскалибуре. Ар��ур восста-новил справедливость, и долгое время в
              К��мелоте царил мир и покой...
            </p>
            <a href="#" class="more-link">подробнее</a>
          </div>
        </article>
      </div>
    </section>

    <footer class="footer">
      <div class="footer-content">
        <div class="footer-section">
          <div class="footer-logo">
            <img
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/220"
              alt="Logo"
              class="logo-image"
            />
          </div>
          <p class="footer-description">
            Семейное кафе и квесты Pandoroom (Пандорум) – это огромный центр
            отдыха для семьи, компаний друзе�� и детей. В наших филиалах Вас
            ждет: три зала фирменного кафе, огромный мир квестов для всех
            возрастов, а также, получившая популярность, батальная игра для
            ��етей и взрослых – Лазертаг.
          </p>
        </div>
        <div class="footer-links">
          <div class="footer-column">
            <h3 class="footer-title">Квесты во Владивостоке</h3>
            <a href="#" class="footer-link">Все квесты</a>
            <a href="#" class="footer-link">Квесты с актерами</a>
            <a href="#" class="footer-link">Квесты без актеров</a>
            <a href="#" class="footer-link">Детские квесты</a>
            <a href="#" class="footer-link">Квесты-приключения</a>
          </div>
          <div class="footer-column">
            <a href="#" class="footer-link">Квесты-экшены</a>
            <a href="#" class="footer-link">Мистические квесты</a>
            <a href="#" class="footer-link">Квесты-хорроры</a>
            <a href="#" class="footer-link">Квесты-детективы</a>
          </div>
          <div class="footer-column">
            <h3 class="footer-title">Праздники во Владивостоке</h3>
            <a href="#" class="footer-link">Праздник для малышей</a>
            <a href="#" class="footer-link">Праздник для детей 6-10 лет</a>
            <a href="#" class="footer-link">Праздник для детей 10-15 лет</a>
            <a href="#" class="footer-link">Индивидуальный расчет праздника</a>
          </div>
          <div class="footer-column">
            <h3 class="footer-title">Семейный центр Пандорум</h3>
            <a href="#" class="footer-link">О центре</a>
            <a href="#" class="footer-link">Кафе</a>
            <a href="#" class="footer-link">Игровая</a>
            <a href="#" class="footer-link">Меню</a>
            <a href="#" class="footer-link">Правила</a>
          </div>
          <div class="footer-column">
            <a href="#" class="footer-link">Программа лояльности</a>
            <a href="#" class="footer-link">Акции и новости</a>
            <a href="#" class="footer-link">Контакты</a>
          </div>
        </div>
        <div class="footer-bottom">
          <div class="footer-contacts">
            <div class="contact-block">
              <div class="address">
                Нижнепортовая, 1 / Посьетская, 27 стр. 2
              </div>
              <div class="footer-phone">8 423 202 26 96</div>
            </div>
            <div class="contact-block">
              <div class="address">Алеутская 17а</div>
              <div class="footer-phone">8 423 205 44 58</div>
            </div>
          </div>
          <div class="social-media">
            <div class="social-text">следите за нами в соц.сетях —</div>
            <div class="social-icons">
              <svg
                width="127"
                height="20"
                viewBox="0 0 127 20"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
                class="social-icon"
              >
                <path
                  d="M11.0286 0C12.1536 0.003 12.7246 0.009 13.2176 0.023L13.4116 0.03C13.6356 0.038 13.8566 0.0479999 14.1236 0.0599999C15.1876 0.11 15.9136 0.278 16.5506 0.525C17.2106 0.779 17.7666 1.123 18.3226 1.678C18.8313 2.17773 19.2248 2.78247 19.4756 3.45C19.7226 4.087 19.8906 4.813 19.9406 5.878C19.9526 6.144 19.9626 6.365 19.9706 6.59L19.9766 6.784C19.9916 7.276 19.9976 7.847 19.9996 8.972L20.0006 9.718V11.028C20.003 11.7574 19.9953 12.4868 19.9776 13.216L19.9716 13.41C19.9636 13.635 19.9536 13.856 19.9416 14.122C19.8916 15.187 19.7216 15.912 19.4756 16.55C19.2248 17.2175 18.8313 17.8223 18.3226 18.322C17.8228 18.8307 17.2181 19.2242 16.5506 19.475C15.9136 19.722 15.1876 19.89 14.1236 19.94L13.4116 19.97L13.2176 19.976C12.7246 19.99 12.1536 19.997 11.0286 19.999L10.2826 20H8.97357C8.24383 20.0026 7.51409 19.9949 6.78457 19.977L6.59057 19.971C6.35318 19.962 6.11584 19.9517 5.87857 19.94C4.81457 19.89 4.08857 19.722 3.45057 19.475C2.7834 19.2241 2.17901 18.8306 1.67957 18.322C1.17051 17.8224 0.776678 17.2176 0.525569 16.55C0.278569 15.913 0.110569 15.187 0.0605687 14.122L0.0305688 13.41L0.0255689 13.216C0.00713493 12.4868 -0.00119929 11.7574 0.000568797 11.028V8.972C-0.0021991 8.2426 0.00513501 7.5132 0.0225689 6.784L0.0295688 6.59C0.0375688 6.365 0.0475688 6.144 0.0595688 5.878C0.109569 4.813 0.277569 4.088 0.524569 3.45C0.776263 2.7822 1.17079 2.17744 1.68057 1.678C2.17972 1.16955 2.78376 0.776074 3.45057 0.525C4.08857 0.278 4.81357 0.11 5.87857 0.0599999C6.14457 0.0479999 6.36657 0.038 6.59057 0.03L6.78457 0.0239999C7.51376 0.00623271 8.24316 -0.0014347 8.97257 0.000999928L11.0286 0ZM10.0006 5C8.67449 5 7.40272 5.52678 6.46503 6.46447C5.52735 7.40215 5.00057 8.67392 5.00057 10C5.00057 11.3261 5.52735 12.5979 6.46503 13.5355C7.40272 14.4732 8.67449 15 10.0006 15C11.3267 15 12.5984 14.4732 13.5361 13.5355C14.4738 12.5979 15.0006 11.3261 15.0006 10C15.0006 8.67392 14.4738 7.40215 13.5361 6.46447C12.5984 5.52678 11.3267 5 10.0006 5ZM10.0006 7C10.3945 6.99993 10.7847 7.07747 11.1487 7.22817C11.5127 7.37887 11.8434 7.5998 12.122 7.87833C12.4007 8.15686 12.6217 8.48754 12.7725 8.85149C12.9233 9.21544 13.001 9.60553 13.0011 9.9995C13.0011 10.3935 12.9236 10.7836 12.7729 11.1476C12.6222 11.5116 12.4013 11.8423 12.1227 12.121C11.8442 12.3996 11.5135 12.6206 11.1496 12.7714C10.7856 12.9223 10.3955 12.9999 10.0016 13C9.20592 13 8.44286 12.6839 7.88025 12.1213C7.31764 11.5587 7.00157 10.7956 7.00157 10C7.00157 9.20435 7.31764 8.44129 7.88025 7.87868C8.44286 7.31607 9.20592 7 10.0016 7M15.2516 3.5C14.92 3.5 14.6021 3.6317 14.3677 3.86612C14.1333 4.10054 14.0016 4.41848 14.0016 4.75C14.0016 5.08152 14.1333 5.39946 14.3677 5.63388C14.6021 5.8683 14.92 6 15.2516 6C15.5831 6 15.901 5.8683 16.1355 5.63388C16.3699 5.39946 16.5016 5.08152 16.5016 4.75C16.5016 4.41848 16.3699 4.10054 16.1355 3.86612C15.901 3.6317 15.5831 3.5 15.2516 3.5Z"
                  fill="#A5A5A5"
                ></path>
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M64.503 18.6888V18.6865L64.5238 18.6371L68 1.29085V1.23578C68 0.803274 67.8377 0.425832 67.4877 0.199826C67.1805 0.00135334 66.827 -0.0124134 66.5789 0.0059424C66.3481 0.0267907 66.1202 0.0729635 65.8997 0.143611C65.8055 0.173336 65.7127 0.207019 65.6215 0.244568L65.6064 0.250304L46.226 7.77505L46.2203 7.77735C46.1609 7.79604 46.1031 7.81945 46.0475 7.84733C45.9098 7.90877 45.7776 7.98169 45.6523 8.0653C45.4031 8.2351 44.929 8.63434 45.009 9.26761C45.075 9.79305 45.4402 10.1257 45.6871 10.299C45.8325 10.4006 45.9892 10.4853 46.1542 10.5514L46.1913 10.5674L46.2029 10.5709L46.211 10.5743L49.6025 11.7044C49.5902 11.9154 49.6122 12.1277 49.6686 12.3411L51.3667 18.7186C51.4595 19.0662 51.6599 19.3764 51.9399 19.6055C52.2199 19.8346 52.5654 19.9711 52.9278 19.9959C53.2902 20.0207 53.6514 19.9325 53.9605 19.7438C54.2697 19.555 54.5114 19.2751 54.6516 18.9434L57.3037 16.1373L61.8579 19.5928L61.9228 19.6203C62.3366 19.7993 62.7226 19.8555 63.0761 19.8085C63.4296 19.7603 63.7101 19.6134 63.9211 19.4471C64.1651 19.2513 64.3596 19.0019 64.489 18.7186L64.4983 18.6991L64.5018 18.6922L64.503 18.6888ZM51.3493 11.9028C51.3305 11.8321 51.335 11.7572 51.3621 11.6891C51.3892 11.621 51.4375 11.5633 51.5 11.5242L62.9996 4.29662C62.9996 4.29662 63.6765 3.88935 63.6522 4.29662C63.6522 4.29662 63.7727 4.36775 63.4099 4.7016C63.0668 5.01938 55.2138 12.5235 54.4187 13.283C54.3755 13.3262 54.3447 13.3801 54.3294 13.439L53.0474 18.2803L51.3493 11.9028Z"
                  fill="#A5A5A5"
                ></path>
                <path
                  d="M125.634 19.9984H121.911C120.503 19.9984 120.079 18.8693 117.555 16.3688C115.35 14.264 114.418 14.0023 113.86 14.0023C113.089 14.0023 112.878 14.2123 112.878 15.2639V18.5785C112.878 19.475 112.585 20 110.219 20C107.924 19.8473 105.699 19.157 103.726 17.9859C101.754 16.8149 100.09 15.1965 98.8729 13.2641C95.9838 9.70174 93.973 5.52165 93 1.05554C93 0.503104 93.2121 0.00235559 94.2757 0.00235559H97.9952C98.9512 0.00235559 99.2954 0.423954 99.6706 1.39799C101.477 6.6607 104.558 11.2385 105.809 11.2385C106.289 11.2385 106.498 11.0285 106.498 9.84449V4.42348C106.34 1.95043 105.013 1.74205 105.013 0.847168C105.03 0.611074 105.139 0.390757 105.317 0.233012C105.496 0.0752675 105.729 -0.00747654 105.968 0.00235559H111.815C112.614 0.00235559 112.878 0.396493 112.878 1.34307V8.66046C112.878 9.45036 113.221 9.71204 113.462 9.71204C113.942 9.71204 114.31 9.45035 115.19 8.58131C117.074 6.30478 118.614 3.76913 119.761 1.05393C119.878 0.727575 120.099 0.44817 120.392 0.258527C120.685 0.0688842 121.032 -0.0205354 121.381 0.00397079H125.102C126.218 0.00397079 126.454 0.55641 126.218 1.34469C124.864 4.34643 123.189 7.19595 121.223 9.84449C120.821 10.4502 120.661 10.7652 121.223 11.476C121.591 12.0284 122.896 13.1074 123.772 14.1332C125.048 15.3931 126.107 16.8501 126.908 18.4461C127.228 19.4734 126.696 19.9984 125.634 19.9984Z"
                  fill="#A5A5A5"
                ></path>
              </svg>
            </div>
          </div>
        </div>
        <div class="copyright">
          <span>2015 — 2024 | ООО «Пандорум» |</span>
          <a href="#" class="privacy-policy">Политика конфиденциальности</a>
        </div>
        <div class="credits">
          <div class="development">
            <span>Разработка сайта —</span>
            <div class="developer">Shelikhov.me</div>
          </div>
          <div class="design">
            <span>Дизайн сайта —</span>
            <svg
              width="187"
              height="69"
              viewBox="0 0 187 69"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
              class="design-logo"
            >
              <text
                fill="#424242"
                xml:space="preserve"
                style="white-space: pre"
                font-family="Rubik"
                font-size="12"
                letter-spacing="0em"
              >
                <tspan x="0" y="10.11">Дизайн сайта —</tspan>
              </text>
              <path
                d="M29.3118 62.8665C25.8826 61.058 21.7019 58.9911 18.2022 56.3605C20.8563 54.2232 29.0064 47.2709 34.8313 37.8994C41.3843 27.518 31.5431 29.1386 31.5431 29.1386C31.5431 29.1386 34.2441 30.4304 31.0029 35.7151C28.4193 40.0133 22.7588 48.4688 19.3531 51.7335C22.336 41.7748 24.0271 30.2895 16.9339 29.8667C5.00231 29.1621 -0.399793 50.5356 0.0229803 54.2467C0.445754 57.9577 1.73756 59.9306 7.42151 58.8972C7.42151 58.8972 3.94538 58.31 3.94538 52.8374C3.94538 47.3648 10.7097 31.3934 16.5111 31.3934C20.1987 31.3934 18.3432 43.2076 14.7966 53.3776C13.082 51.5691 11.7902 49.5022 11.2265 47.1769C11.2265 47.1769 8.36101 51.3107 13.3638 57.1826C11.6258 61.4573 9.62933 65.0743 7.75034 66.7889C7.75034 66.7889 11.5788 69.443 13.7396 66.0138C14.2329 65.2622 15.2428 63.0544 16.4172 60.1185C17.1688 60.7292 17.9908 61.3399 18.9069 61.974C31.1203 70.2651 36.9217 71.4864 39.2235 64.2053C39.2469 64.2288 36.0057 66.3896 29.3118 62.8665Z"
                fill="#535353"
              ></path>
              <path
                d="M55.5241 42.9024C55.5241 42.9024 52.2359 40.765 51.3669 41.9159C50.4978 43.0433 49.6758 43.3956 49.6758 43.3956C49.6758 43.3956 50.4274 40.9295 51.132 40.3892C51.8366 39.849 49.1356 38.4633 48.1021 39.0505C48.1021 39.0505 44.7904 45.0632 43.4281 53.4248C42.6765 53.5187 41.9719 53.4952 41.3377 53.3778C43.0758 44.2647 36.241 42.2682 34.0332 43.0668C32.5769 43.607 31.8958 45.7913 32.6709 48.3045C28.5606 52.4383 29.2652 58.9208 30.7449 60.424C32.2951 61.9977 38.1435 64.8631 40.8915 55.2098C41.784 55.3272 42.5826 55.2803 43.1698 55.2098C42.9584 56.9244 42.8409 58.7329 42.8644 60.5884C42.8644 60.5884 44.626 61.7158 46.2701 60.8937C46.2701 60.8937 46.7398 52.5557 51.7896 47.2006C51.7896 47.2006 50.8501 51.7102 56.4871 51.3579C56.5106 51.3579 55.0309 46.9892 55.5241 42.9024ZM37.0865 45.8618C38.1904 47.2241 38.3079 49.4319 37.9556 51.7102C36.8047 50.6063 36.1705 49.197 35.9591 48.0461C35.4894 45.439 37.0865 45.8618 37.0865 45.8618ZM33.8922 59.6959C32.7648 58.3806 33.8687 54.0354 34.362 51.4048C34.7143 51.8511 35.1371 52.2974 35.6068 52.7436C36.2175 53.3073 36.8282 53.7301 37.4388 54.0824C36.4289 57.582 34.5969 60.5414 33.8922 59.6959Z"
                fill="#535353"
              ></path>
              <path
                d="M95.969 48.5154C96.9555 36.2315 104.237 26.6016 104.237 26.6016C104.237 26.6016 103.062 23.6187 100.713 24.7226C98.3647 25.8265 94.959 35.4094 93.8317 38.6976C92.7043 41.9859 89.3221 42.5731 89.3221 42.5731C89.51 41.4457 88.8993 39.825 86.1043 39.5667C83.3328 39.2848 81.3598 40.6941 81.3598 40.6941C83.873 31.487 86.574 29.7724 86.5975 28.8799C86.6445 27.9874 84.0609 26.6956 82.6751 26.766C81.3129 26.8365 78.4944 37.5233 76.451 43.0663C74.4076 48.6093 71.2368 53.9175 69.804 52.9075C68.3478 51.8976 72.3877 41.9389 72.6695 41.0934C72.9514 40.2243 71.2133 39.0969 69.9215 39.1674C69.4987 39.1909 68.5592 40.8585 67.4318 43.0663C66.3749 41.6805 64.7308 40.2478 63.0162 41.0464C60.0333 42.4556 53.9735 55.679 56.9564 57.5345C59.9393 59.3666 61.8888 57.605 63.1806 55.2328C64.4724 52.8605 65.9991 51.1929 65.9991 51.1929C65.9991 51.1929 65.2475 57.0648 68.6532 57.0178C72.0588 56.9708 74.1727 52.6022 74.1727 52.6022C73.9378 56.4071 76.1222 56.7125 77.4609 56.4071C78.7997 56.1018 78.8232 54.2933 78.8232 54.2933C79.8332 44.499 84.883 41.8919 84.883 41.8919C88.3591 44.546 80.9371 52.2264 79.5278 53.8C78.1186 55.3737 77.8367 58.4271 80.5143 58.615C83.1684 58.8029 87.1377 50.9346 88.7819 47.7403C90.426 44.546 92.4929 44.593 92.4929 44.593C92.4929 44.593 90.8488 52.062 92.1875 55.8669C93.5263 59.6719 98.1298 59.6249 98.1298 59.6249L98.0124 58.568C95.2644 56.9943 95.969 48.5154 95.969 48.5154ZM60.9728 53.2363C59.6105 51.3104 63.7443 44.9688 64.3785 43.7944C64.8247 42.9489 66.1165 43.8414 66.7742 44.4051C64.5194 48.8677 61.8183 54.4107 60.9728 53.2363Z"
                fill="#535353"
              ></path>
              <path
                d="M134.089 37.6168C134.089 37.6168 131.2 39.5662 129.203 39.6836C128.006 39.7541 126.949 39.026 126.291 38.4623C128.241 32.8253 130.801 30.1947 131.576 29.2083C132.868 27.5641 132.985 27.2823 131.881 25.967C130.777 24.6282 129.368 25.1449 129.368 25.1449C127.912 25.7321 126.385 28.9499 124.835 32.7314C124.201 34.2581 123.567 35.8787 122.909 37.4758C122.627 38.2509 122.322 39.1199 122.04 40.036C121.053 40.5527 119.809 41.0694 118.799 41.1164C117.601 41.1868 116.544 40.4587 115.886 39.895C117.836 34.2581 120.396 31.6275 121.171 30.641C122.463 28.9969 122.58 28.715 121.476 27.3997C120.372 26.061 118.963 26.5777 118.963 26.5777C115.792 27.8695 112.269 41.7036 108.793 46.5185C105.317 51.3334 102.029 51.5213 102.827 46.5185C102.898 46.0957 102.992 45.6494 103.086 45.2267C109.004 45.7199 110.555 39.2844 111.001 37.1C111.471 34.6808 109.404 33.1072 108.3 33.0367C107.196 32.9662 105.646 31.7919 101.888 37.6872C98.1297 43.5826 98.1766 52.907 102.24 53.0715C106.303 53.2359 107.806 51.0515 108.229 50.3939C108.652 49.7362 109.568 49.7597 109.568 49.7597C109.568 49.7597 108.441 55.0444 109.638 57.2757C110.836 59.507 113.702 58.9433 113.702 58.9433C121.5 54.4102 117.319 43.1833 117.319 43.1833C119.151 43.1363 120.396 42.784 121.312 42.3377C120.772 44.2402 120.278 46.2836 119.926 48.3505C119.949 48.3505 119.949 48.3505 119.949 48.3505C119.949 48.3505 119.856 48.7968 119.738 49.4779C119.644 50.1825 119.55 50.8871 119.503 51.5918C119.409 53.1184 119.456 54.8095 120.02 55.843C121.241 58.0743 124.06 57.5106 124.06 57.5106C131.881 52.9775 127.677 41.7505 127.677 41.7505C131.834 41.6331 133.008 39.989 133.831 39.1199C134.723 38.2274 134.089 37.6168 134.089 37.6168ZM107.384 36.9121C108.065 37.1 107.525 40.4587 106.233 41.7036C105.317 42.5726 104.495 42.3847 104.072 42.1968C105.293 39.0965 106.914 36.7947 107.384 36.9121ZM116.098 48.9142C115.816 53.3063 113.537 55.702 113.537 55.702C113.561 51.3804 113.984 47.7633 114.618 44.7099C115.44 45.5555 116.215 46.8708 116.098 48.9142ZM126.455 47.5049C126.174 51.8971 123.895 54.2928 123.895 54.2928C123.919 49.9711 124.342 46.3541 124.976 43.3007C125.821 44.1462 126.596 45.4615 126.455 47.5049Z"
                fill="#535353"
              ></path>
              <text
                fill="#424242"
                xml:space="preserve"
                style="white-space: pre"
                font-family="Rubik"
                font-size="8"
                letter-spacing="0em"
              >
                <tspan x="145" y="32.74">Дизайн</tspan>
                <tspan x="145" y="44.74">Маркетинг</tspan>
                <tspan x="145" y="56.74">К��нтент</tspan>
              </text>
            </svg>
          </div>
        </div>
      </div>
    </footer>
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
	:root {
  --primary: #b9d62e;
  --secondary: #2c3900;
  --danger: #ff4d4d;
  --text-primary: #000;
  --text-secondary: #7e7e7e;
  --bg-primary: #000;
  --bg-secondary: #1a1a1a;
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: "Manrope", sans-serif;
  color: #fff;
  background-color: #000;
}

a {
  text-decoration: none;
  color: inherit;
}

button {
  border: none;
  background: none;
  cursor: pointer;
  font-family: inherit;
  color: inherit;
}

/* Header Styles */
.header-top {
  padding: 9px 0;
  background-color: #000;
}

.header-top-links {
  margin: 0 auto;
  padding: 0 50px;
  display: flex;
  justify-content: flex-end;
  gap: 50px;
  max-width: 1920px;
}

.link {
  color: #7e7e7e;
  font-size: 16px;
  cursor: pointer;
}

.header-main {
  margin: 0 auto;
  padding: 20px 50px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  max-width: 1920px;
}

.logo {
  width: 220px;
}

.logo-image {
  width: 100%;
  height: auto;
}

.main-nav {
  display: flex;
  gap: 60px;
}

.nav-item {
  font-family: "Actay Wide", sans-serif;
  font-weight: 700;
  font-size: 21px;
}

.nav-item-dropdown {
  font-family: "Actay Wide", sans-serif;
  font-weight: 700;
  font-size: 21px;
  display: flex;
  align-items: center;
  gap: 10px;
}

.contact-info {
  display: flex;
  gap: 50px;
  text-align: right;
}

.location {
  font-size: 14px;
  color: var(--text-secondary);
}

.phone {
  font-family: "Actay Wide", sans-serif;
  font-weight: 700;
  font-size: 21px;
  margin-top: 8px;
}

/* Breadcrumb */
.breadcrumb {
  margin: 0 auto;
  padding: 20px 50px;
  max-width: 1920px;
  color: var(--text-secondary);
  text-decoration: underline;
  font-size: 18px;
}

/* Welcome Section */
.welcome-section {
  margin: 0 auto;
  padding: 20px 50px;
  font-family: "Actay Wide", sans-serif;
  font-weight: 700;
  font-size: 64px;
  color: var(--text-primary);
  text-shadow:
    2px 2px 0 var(--primary),
    -2px -2px 0 var(--secondary);
  max-width: 1920px;
}

/* Slider Section */
.slider-section {
  margin: 50px 0;
}

.slider-container {
  display: flex;
  gap: 20px;
  overflow: hidden;
}

.slide {
  position: relative;
  width: 1061px;
  height: 339px;
  border-radius: 20px;
  overflow: hidden;
}

.slide-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.slide-content {
  position: absolute;
  bottom: 0;
  left: 0;
  padding: 30px;
  background: linear-gradient(180deg, transparent 0%, rgba(0, 0, 0, 0.7) 100%);
}

.timer {
  padding: 10px;
  border-radius: 5px;
  font-size: 16px;
  margin-bottom: 20px;
}

.danger {
  background-color: var(--danger);
}

.success {
  background-color: var(--primary);
  color: var(--secondary);
}

.slide-title {
  font-family: "Actay Wide", sans-serif;
  font-weight: 700;
  font-size: 28px;
  margin-bottom: 10px;
}

.slide-category {
  color: var(--text-secondary);
  font-size: 14px;
}

/* My Events Section */
.my-events-section {
  margin: 0 auto;
  padding: 20px 50px;
  max-width: 1920px;
  background: linear-gradient(
    180deg,
    rgba(255, 255, 255, 0.05) 0%,
    transparent 100%
  );
  border-radius: 20px;
}

.section-header {
  font-family: "Actay Wide", sans-serif;
  font-weight: 700;
  font-size: 44px;
  margin-bottom: 30px;
  text-shadow:
    2px 2px 0 var(--primary),
    -2px -2px 0 var(--secondary);
}

.book-button {
  padding: 5px 20px;
  border-radius: 50px;
  color: #2c3900;
  font-weight: 600;
  font-size: 18px;
  background-color: var(--primary);
}

/* Booked Quests Section */
.booked-quests-section {
  margin: 50px auto;
  padding: 0 50px;
  max-width: 1920px;
}

.quest-cards {
  display: flex;
  gap: 30px;
  flex-wrap: wrap;
}

.quest-card {
  width: 349px;
}

.quest-image {
  height: 500px;
  padding: 30px 20px;
  border-radius: 20px;
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
  background-size: cover;
  background-position: center;
}

.quest-image-harry {
  background-image: url("https://cdn.builder.io/api/v1/image/assets/TEMP/1e165500dbc9ec599a8c5a1b2239b20f14dd5dc1");
}

.quest-image-plague {
  background-image: url("https://cdn.builder.io/api/v1/image/assets/TEMP/a7f63c67bbbb8eac79e314a41dac7b9c07a8bd92");
}

.quest-image-pirates {
  background-image: url("https://cdn.builder.io/api/v1/image/assets/TEMP/44aeab7025ea01ec2a36b9a24e844a50de0a42cd");
}

.quest-image-resident {
  background-image: url("https://cdn.builder.io/api/v1/image/assets/TEMP/1718c53b3b5603181fa6d449cd11f61434167283");
}

.quest-tag {
  padding: 5px 10px;
  border-radius: 5px;
  font-size: 16px;
  margin-bottom: 12px;
  background-color: var(--secondary);
  align-self: flex-start;
}

.quest-title {
  font-family: "Manrope", sans-serif;
  font-size: 24px;
  margin-bottom: 12px;
}

.quest-info {
  display: flex;
  align-items: center;
  gap: 30px;
  color: var(--text-secondary);
  font-size: 14px;
}

.rating {
  display: flex;
  gap: 2px;
}

.rating i {
  color: var(--primary);
}

.rating i.empty {
  color: rgba(63, 74, 27, 0.5);
}

.quest-details {
  display: flex;
  gap: 15px;
  margin-top: 30px;
}

.add-animator {
  padding: 10px;
  border-radius: 12px;
  margin-top: 15px;
  color: #2c3900;
  background-color: var(--primary);
  width: 100%;
  text-align: center;
}

.with-animator {
  padding: 10px;
  border-radius: 12px;
  margin-top: 15px;
  color: var(--text-secondary);
  background-color: var(--bg-secondary);
  text-align: center;
}

/* Photos Section */
.photos-section {
  margin: 50px auto;
  padding: 0 50px;
  max-width: 1920px;
}

.subtitle {
  color: var(--text-secondary);
  font-size: 21px;
  margin-bottom: 30px;
}

.photo-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 30px;
}

.photo-card {
  position: relative;
  border-radius: 20px;
  overflow: hidden;
}

.photo-image {
  width: 100%;
  height: 348px;
  object-fit: cover;
}

.photo-info {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  padding: 30px;
  background: linear-gradient(180deg, transparent 0%, rgba(0, 0, 0, 0.7) 100%);
}

.photo-date {
  padding: 5px 10px;
  border-radius: 3px;
  font-size: 16px;
  margin-bottom: 10px;
  background-color: var(--secondary);
  display: inline-block;
}

.photo-title {
  font-family: "Actay Wide", sans-serif;
  font-weight: 700;
  font-size: 26px;
  text-align: center;
}

/* Promotions Section */
.promotions-section {
  margin: 50px auto;
  padding: 0 50px;
  max-width: 1920px;
}

.promotion-cards {
  display: flex;
  gap: 30px;
}

.promotion-card {
  width: 390px;
}

.promotion-image {
  width: 100%;
  height: 451px;
  border-radius: 20px;
  object-fit: cover;
  margin-bottom: 30px;
}

.promotion-content {
  padding: 20px 0;
}

.promotion-category {
  color: #949494;
  font-size: 16px;
  margin-bottom: 5px;
}

.promotion-title {
  font-family: "Manrope", sans-serif;
  font-weight: 700;
  font-size: 24px;
  margin-bottom: 20px;
}

.promotion-description {
  font-family: "Montserrat", sans-serif;
  font-size: 21px;
  line-height: 1.6;
  margin-bottom: 20px;
}

.more-link {
  color: var(--primary);
  font-size: 21px;
  text-decoration: underline;
}

/* Footer */
.footer {
  padding: 75px 0;
  margin-top: 100px;
  background-color: var(--bg-primary);
}

.footer-content {
  margin: 0 auto;
  padding: 0 50px;
  max-width: 1920px;
}

.footer-section {
  margin-bottom: 50px;
}

.footer-logo {
  margin-bottom: 30px;
}

.footer-description {
  color: #a6a6a6;
  font-size: 16px;
  line-height: 1.5;
  max-width: 767px;
}

.footer-links {
  padding: 50px 0;
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  gap: 50px;
  border-top: 1px solid rgba(255, 255, 255, 0.1);
}

.footer-title {
  color: #4e4e4e;
  font-family: Manrope;
  font-weight: 700;
  font-size: 21px;
  margin-bottom: 20px;
}

.footer-link {
  color: var(--primary);
  font-family: Manrope;
  font-size: 21px;
  margin-bottom: 15px;
  display: block;
}

.footer-bottom {
  display: flex;
  justify-content: space-between;
  align-items: flex-end;
}

.footer-contacts {
  display: flex;
  gap: 50px;
}

.contact-block {
  text-align: right;
}

.address {
  font-size: 16px;
  color: #fff;
  margin-bottom: 8px;
}

.footer-phone {
  font-family: Manrope;
  font-weight: 700;
  font-size: 26px;
  margin-top: 8px;
}

.social-media {
  display: flex;
  align-items: center;
  gap: 20px;
  color: #a6a6a6;
  font-size: 14px;
}

.copyright {
  margin: 20px 0;
  color: #a6a6a6;
  font-size: 14px;
}

.privacy-policy {
  text-decoration: underline;
  cursor: pointer;
}

.credits {
  display: flex;
  gap: 50px;
  color: #424242;
  font-family: Rubik;
  font-size: 12px;
}

.developer {
  font-size: 28px;
  font-weight: 600;
  color: #535353;
  margin-top: 10px;
}

.design-logo {
  height: 69px;
}

/* Responsive Styles */
@media (max-width: 991px) {
  .header-top-links {
    display: none;
  }

  .header-main {
    padding: 15px 20px;
  }

  .main-nav {
    display: none;
  }

  .contact-info {
    flex-direction: column;
    gap: 10px;
  }

  .slider-container {
    flex-direction: column;
  }

  .slide {
    width: 100%;
  }

  .photo-grid {
    grid-template-columns: repeat(2, 1fr);
  }

  .promotion-cards {
    flex-wrap: wrap;
  }

  .footer-links {
    grid-template-columns: repeat(3, 1fr);
  }
}

@media (max-width: 640px) {
  .header-main {
    padding: 10px;
  }

  .logo {
    width: 150px;
  }

  .contact-info {
    font-size: 12px;
  }

  .welcome-section {
    font-size: 36px;
  }

  .section-header {
    font-size: 32px;
  }

  .photo-grid {
    grid-template-columns: 1fr;
  }

  .promotion-card {
    width: 100%;
  }

  .footer-links {
    grid-template-columns: 1fr;
  }

  .footer-bottom {
    flex-direction: column;
    align-items: center;
    text-align: center;
  }

  .footer-contacts {
    flex-direction: column;
  }

  .social-media {
    margin-top: 20px;
  }
}

	</style>
	
  </body>
</html>

