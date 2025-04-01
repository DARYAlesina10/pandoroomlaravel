<!doctype html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Квесты во Владивостоке - Pandoroom</title>
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
      /* Base styles */
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
        overflow-x: hidden;
      }

      /* Top navigation */
      .top-nav {
        background-color: rgba(0, 0, 0, 1);
        display: flex;
        width: 100%;
        padding: 10px 70px;
        flex-direction: column;
        align-items: flex-end;
        font-size: 16px;
        color: rgba(126, 126, 126, 1);
        font-weight: 500;
        line-height: 31px;
        justify-content: center;
      }

      .top-nav-links {
        display: flex;
        align-items: center;
        gap: 40px 50px;
        justify-content: flex-start;
        flex-wrap: wrap;
      }

      .top-nav-link {
        align-self: stretch;
        margin-top: auto;
        margin-bottom: auto;
      }

      /* Header section */
      .header-section {
        z-index: 10;
        display: flex;
        margin-top: 46px;
        width: 100%;
        padding-left: 50px;
        flex-direction: column;
        align-items: flex-start;
      }

      .header-container {
        display: flex;
        width: 100%;
        max-width: 1827px;
        align-items: stretch;
        gap: 20px;
        color: rgba(255, 255, 255, 1);
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

      .header-content {
        display: flex;
        align-items: stretch;
        gap: 40px 100px;
        flex-wrap: wrap;
      }

      .main-nav {
        align-self: flex-end;
        display: flex;
        margin-top: 21px;
        align-items: center;
        gap: 40px 60px;
        font-family:
          Actay Wide,
          -apple-system,
          Roboto,
          Helvetica,
          sans-serif;
        font-size: 21px;
        font-weight: 700;
        line-height: 1;
        justify-content: flex-start;
        flex-wrap: wrap;
      }

      .main-nav-link {
        align-self: stretch;
        margin-top: auto;
        margin-bottom: auto;
      }

      .menu-icon {
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
        gap: 40px 50px;
        text-align: right;
        justify-content: flex-start;
        flex-wrap: wrap;
      }

      .contact-block {
        display: flex;
        min-width: 240px;
        flex-direction: column;
        align-items: stretch;
        justify-content: flex-start;
        width: 268px;
      }

      .contact-address {
        font-size: 14px;
        font-weight: 400;
        align-self: flex-end;
      }

      .contact-phone {
        font-size: 21px;
        font-family:
          Actay Wide,
          -apple-system,
          Roboto,
          Helvetica,
          sans-serif;
        font-weight: 700;
        margin-top: 8px;
      }

      .contact-block-alt {
        width: 189px;
      }

      /* Breadcrumb */
      .breadcrumb {
        align-self: stretch;
        margin-top: 95px;
        margin-left: 152px;
        gap: 20px;
        font-size: 18px;
        color: #ffffff;
        font-weight: 400;
        text-decoration: underline;
        line-height: 1;
      }

      /* Page title */
      .page-title {
        color: rgba(255, 255, 255, 1);
        font-size: 44px;
        font-family:
          Actay Wide,
          -apple-system,
          Roboto,
          Helvetica,
          sans-serif;
        font-weight: 700;
        line-height: 78px;
        margin-top: 30px;
        margin-left: 152px;
      }

      /* Filter section */
      .filter-section {
        margin-top: 150px;
        margin-left: 152px;
        width: 1265px;
        max-width: 100%;
      }

      .filter-container {
        display: flex;
        width: 100%;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
      }

      .location-filter {
        display: flex;
        align-items: center;
        gap: 15px;
        font-size: 18px;
        color: rgba(44, 57, 0, 1);
        font-weight: 500;
        line-height: 32px;
        justify-content: flex-start;
        flex-wrap: wrap;
      }

      .filter-option {
        align-self: stretch;
        border-radius: 50px;
        background-color: rgba(36, 36, 36, 1);
        margin-top: auto;
        margin-bottom: auto;
        padding: 5px 20px;
        gap: 12px;
        color: #ffffff;
      }

      .filter-option-active {
        align-self: stretch;
        border-radius: 50px;
        background-color: rgba(140, 182, 0, 1);
        margin-top: auto;
        margin-bottom: auto;
        padding: 5px 20px;
        gap: 12px;
        white-space: nowrap;
      }

      .genre-filter {
        align-self: stretch;
        display: flex;
        margin-top: 30px;
        width: 100%;
        align-items: center;
        gap: 30px;
        font-size: 18px;
        font-weight: 500;
        line-height: 32px;
        justify-content: flex-start;
        flex-wrap: wrap;
      }

      .genre-options {
        align-self: stretch;
        display: flex;
        min-width: 240px;
        margin-top: auto;
        margin-bottom: auto;
        align-items: center;
        gap: 15px;
        color: rgba(44, 57, 0, 1);
        justify-content: flex-start;
        flex-wrap: wrap;
      }

      .genre-option-active {
        align-self: stretch;
        border-radius: 50px;
        background-color: rgba(140, 182, 0, 1);
        margin-top: auto;
        margin-bottom: auto;
        padding: 5px 20px;
        gap: 12px;
      }

      .genre-option-dropdown {
        border-radius: 50px;
        background-color: rgba(36, 36, 36, 1);
        align-self: stretch;
        display: flex;
        margin-top: auto;
        margin-bottom: auto;
        padding: 5px 20px;
        align-items: center;
        gap: 12px;
        color: #ffffff;
        white-space: nowrap;
        justify-content: flex-start;
      }

      .dropdown-text {
        align-self: stretch;
        margin-top: auto;
        margin-bottom: auto;
      }

      .dropdown-icon {
        aspect-ratio: 1;
        object-fit: contain;
        object-position: center;
        width: 8px;
        align-self: stretch;
        margin-top: auto;
        margin-bottom: auto;
        flex-shrink: 0;
      }

      .actor-filter {
        align-self: stretch;
        margin-top: auto;
        margin-bottom: auto;
        gap: 20px;
        color: rgba(255, 255, 255, 1);
      }

      .difficulty-filter {
        display: flex;
        margin-top: 30px;
        align-items: center;
        gap: 15px;
        justify-content: flex-start;
        flex-wrap: wrap;
      }

      .difficulty-option {
        align-self: stretch;
        border-radius: 50px;
        background-color: rgba(140, 182, 0, 1);
        margin-top: auto;
        margin-bottom: auto;
        padding: 5px 20px;
        gap: 12px;
        font-size: 18px;
        color: rgba(44, 57, 0, 1);
        font-weight: 500;
        line-height: 32px;
      }

      .difficulty-option-dropdown {
        border-radius: 50px;
        background-color: rgba(140, 182, 0, 1);
        align-self: stretch;
        display: flex;
        margin-top: auto;
        margin-bottom: auto;
        padding: 5px 20px;
        align-items: center;
        gap: 12px;
        justify-content: flex-start;
      }

      .difficulty-text {
        color: rgba(44, 57, 0, 1);
        font-size: 18px;
        font-weight: 500;
        line-height: 32px;
        align-self: stretch;
        margin-top: auto;
        margin-bottom: auto;
      }

      .difficulty-icons {
        align-self: stretch;
        display: flex;
        margin-top: auto;
        margin-bottom: auto;
        align-items: center;
        gap: -4px;
        justify-content: flex-start;
      }

      .difficulty-icon {
        aspect-ratio: 1;
        object-fit: contain;
        object-position: center;
        width: 20px;
        align-self: stretch;
        margin-top: auto;
        margin-bottom: auto;
      }

      .difficulty-option-selected {
        border-radius: 50px;
        background-color: rgba(36, 36, 36, 1);
        align-self: stretch;
        display: flex;
        margin-top: auto;
        margin-bottom: auto;
        padding: 5px 20px;
        align-items: center;
        gap: 12px;
        font-size: 18px;
        color: #ffffff;
        font-weight: 500;
        white-space: nowrap;
        line-height: 32px;
        justify-content: flex-start;
      }

      .difficulty-icon-medium {
        aspect-ratio: 1.59;
        object-fit: contain;
        object-position: center;
        width: 35px;
        align-self: stretch;
        margin-top: auto;
        margin-bottom: auto;
        flex-shrink: 0;
        gap: -4px;
      }

      .difficulty-icon-dropdown {
        aspect-ratio: 1;
        object-fit: contain;
        object-position: center;
        width: 8px;
        align-self: stretch;
        margin-top: auto;
        margin-bottom: auto;
        flex-shrink: 0;
      }

      .difficulty-icon-hard {
        aspect-ratio: 2.32;
        object-fit: contain;
        object-position: center;
        width: 51px;
        align-self: stretch;
        margin-top: auto;
        margin-bottom: auto;
        flex-shrink: 0;
        gap: -4px;
      }

      .difficulty-option-very-hard {
        border-radius: 50px;
        background-color: rgba(140, 182, 0, 1);
        align-self: stretch;
        display: flex;
        min-width: 240px;
        margin-top: auto;
        margin-bottom: auto;
        padding: 5px 20px;
        align-items: center;
        gap: 12px;
        font-size: 18px;
        color: rgba(44, 57, 0, 1);
        font-weight: 500;
        line-height: 32px;
        justify-content: flex-start;
      }

      .difficulty-icon-very-hard {
        aspect-ratio: 3;
        object-fit: contain;
        object-position: center;
        width: 66px;
        align-self: stretch;
        margin-top: auto;
        margin-bottom: auto;
        flex-shrink: 0;
        gap: -4px;
      }

      /* Calendar section */
      .calendar-section {
        align-self: flex-end;
        margin-top: 100px;
        width: 100%;
        max-width: 1718px;
        font-weight: 400;
      }

      .calendar-container {
        display: flex;
        width: 100%;
        align-items: center;
        gap: 30px;
        justify-content: flex-start;
      }

      .calendar-date {
        align-self: stretch;
        display: flex;
        margin-top: auto;
        margin-bottom: auto;
        flex-direction: column;
        align-items: stretch;
        color: #ffffff;
        justify-content: flex-start;
        width: 92px;
      }

      .date-number-container {
        display: flex;
        width: 100%;
        align-items: center;
        gap: 5px;
        justify-content: flex-start;
      }

      .date-number {
        font-size: 48px;
        line-height: 1;
        align-self: stretch;
        margin-top: auto;
        margin-bottom: auto;
      }

      .date-month {
        font-size: 24px;
        line-height: 1;
        align-self: stretch;
        margin-top: auto;
        margin-bottom: auto;
      }

      .date-day {
        align-self: center;
        margin-top: 10px;
        gap: 5px;
        font-size: 16px;
        white-space: nowrap;
        line-height: 1;
      }

      .calendar-divider {
        background-color: rgba(255, 255, 255, 0.25);
        align-self: stretch;
        display: flex;
        margin-top: auto;
        margin-bottom: auto;
        width: 1px;
        flex-shrink: 0;
        height: 100px;
      }

      .date-weekend {
        color: rgba(234, 185, 185, 1);
      }

      /* Quest cards section */
      .quests-section {
        align-self: center;
        margin-top: 100px;
        width: 100%;
        max-width: 1517px;
        font-weight: 400;
        color: #ffffff;
      }

      .quests-container {
        display: flex;
        width: 100%;
        flex-direction: column;
        align-items: stretch;
        justify-content: flex-start;
      }

      .quests-row {
        display: flex;
        width: 100%;
        align-items: center;
        gap: 39px;
        justify-content: flex-start;
        flex-wrap: wrap;
      }

      .quest-card {
        border-radius: 0px;
        align-self: stretch;
        min-width: 240px;
        margin-top: auto;
        margin-bottom: auto;
        flex-grow: 1;
        flex-shrink: 1;
        width: 280px;
      }

      .quest-card-content {
        display: flex;
        flex-direction: column;
        border-radius: 20px;
        position: relative;
        aspect-ratio: 0.7;
        min-height: 500px;
        width: 100%;
        padding: 373px 16px 30px 20px;
        align-items: stretch;
        font-family:
          Arial,
          -apple-system,
          Roboto,
          Helvetica,
          sans-serif;
        color: rgba(255, 255, 255, 1);
        justify-content: flex-end;
      }

      .quest-image {
        position: absolute;
        inset: 0;
        height: 100%;
        width: 100%;
        object-fit: cover;
        object-position: center;
      }

      .quest-genre {
        position: relative;
        align-self: flex-start;
        border-radius: 5px;
        background-color: rgba(182, 0, 157, 1);
        padding: 5px 10px;
        gap: 10px;
        font-size: 16px;
        white-space: nowrap;
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
      }

      .quest-info {
        position: relative;
        display: flex;
        margin-top: 12px;
        align-items: center;
        gap: 30px;
        font-size: 14px;
        color: #ffffff;
        justify-content: flex-start;
      }

      .quest-info-icon {
        aspect-ratio: 3.14;
        object-fit: contain;
        object-position: center;
        width: 66px;
        align-self: stretch;
        margin-top: auto;
        margin-bottom: auto;
        flex-shrink: 0;
        gap: -4px;
      }

      .quest-info-text {
        align-self: stretch;
        margin-top: auto;
        margin-bottom: auto;
      }

      .quest-times {
        display: flex;
        margin-top: 30px;
        width: 100%;
        align-items: stretch;
        gap: 13px;
        font-size: 18px;
        white-space: nowrap;
      }

      .quest-time {
        align-self: stretch;
        border-radius: 12px;
        background-color: rgba(255, 255, 255, 0.05);
        padding: 10px 7px;
        gap: 10px;
      }

      .quest-time-unavailable {
        align-self: stretch;
        border-radius: 12px;
        background-color: rgba(255, 255, 255, 0);
        padding: 10px 7px;
        gap: 10px;
        text-decoration: line-through;
      }

      .quest-times-additional {
        display: flex;
        margin-top: 15px;
        width: 277px;
        max-width: 100%;
        align-items: stretch;
        gap: 13px;
        font-size: 18px;
        white-space: nowrap;
      }

      /* News section */
      .news-section {
        align-self: flex-end;
        margin-top: 150px;
        width: 100%;
        max-width: 1718px;
      }

      .news-title {
        color: rgba(255, 255, 255, 1);
        font-size: 44px;
        font-family:
          Actay Wide,
          -apple-system,
          Roboto,
          Helvetica,
          sans-serif;
        font-weight: 700;
        line-height: 1;
      }

      .news-container {
        display: flex;
        margin-top: 50px;
        width: 100%;
        align-items: flex-start;
        gap: 40px 53px;
        font-family:
          Manrope,
          -apple-system,
          Roboto,
          Helvetica,
          sans-serif;
        justify-content: flex-start;
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
      }

      .news-headline {
        color: rgba(255, 255, 255, 1);
        font-size: 24px;
        font-weight: 700;
        line-height: 1;
        margin-top: 5px;
      }

      .news-text {
        color: rgba(255, 255, 255, 1);
        font-size: 21px;
        font-weight: 400;
        line-height: 31px;
        margin-top: 21px;
      }

      .news-link {
        color: rgba(140, 182, 0, 1);
        font-size: 21px;
        font-weight: 400;
        line-height: 1;
        text-decoration: underline;
        margin-top: 21px;
      }

      /* Reviews section */
      .reviews-section {
        display: flex;
        flex-direction: column;
        position: relative;
        min-height: 961px;
        margin-top: -315px;
        width: 100%;
        padding: 459px 0 76px 80px;
      }

      .reviews-background {
        position: absolute;
        inset: 0;
        height: 100%;
        width: 100%;
        object-fit: cover;
        object-position: center;
      }

      .reviews-title {
        position: relative;
        color: rgba(255, 255, 255, 1);
        font-size: 44px;
        font-family:
          Actay Wide,
          -apple-system,
          Roboto,
          Helvetica,
          sans-serif;
        font-weight: 700;
        line-height: 1;
        align-self: flex-start;
      }

      .reviews-container {
        position: relative;
        align-self: flex-end;
        display: flex;
        margin-top: 50px;
        align-items: flex-start;
        gap: 40px 50px;
        justify-content: flex-start;
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
        justify-content: flex-start;
      }

      .review-author-container {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        justify-content: flex-start;
      }

      .review-author {
        color: rgba(255, 255, 255, 1);
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
          Arial,
          -apple-system,
          Roboto,
          Helvetica,
          sans-serif;
        font-weight: 400;
        line-height: 32px;
      }

      .review-rating {
        display: flex;
        margin-top: 10px;
        align-items: center;
        gap: 5px;
        justify-content: flex-start;
      }

      .rating-star {
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
        color: rgba(255, 255, 255, 1);
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

      /* Footer section */
      .footer-section {
        align-self: center;
        margin-top: 28px;
        width: 100%;
        max-width: 1516px;
        padding-top: 75px;
      }

      .footer-divider {
        background-color: rgba(255, 255, 255, 0.1);
        display: flex;
        min-height: 2px;
        width: 100%;
      }

      .footer-container {
        display: flex;
        margin-top: 92px;
        min-height: 709px;
        width: 100%;
        flex-direction: column;
        align-items: stretch;
        justify-content: flex-start;
      }

      .footer-content {
        width: 100%;
      }

      .footer-links-container {
        width: 100%;
        max-width: 1453px;
      }

      .footer-links-row {
        gap: 20px;
        display: flex;
      }

      .footer-column {
        display: flex;
        flex-direction: column;
        align-items: stretch;
        line-height: normal;
        width: 33%;
        margin-left: 0px;
      }

      .footer-column-middle {
        margin-left: 20px;
      }

      .footer-column-right {
        margin-left: 20px;
      }

      .footer-links-block {
        display: flex;
        width: 100%;
        flex-direction: column;
        align-items: stretch;
      }

      .footer-category {
        color: rgba(78, 78, 78, 1);
        font-size: 21px;
        font-family:
          Arial,
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
      }

      .footer-links-grid-row {
        gap: 20px;
        display: flex;
      }

      .footer-links-grid-column {
        display: flex;
        flex-direction: column;
        align-items: stretch;
        line-height: normal;
        width: 50%;
        margin-left: 0px;
      }

      .footer-links-grid-column-right {
        margin-left: 20px;
      }

      .footer-links-list {
        flex-grow: 1;
        font-family:
          Arial,
          -apple-system,
          Roboto,
          Helvetica,
          sans-serif;
        font-size: 21px;
        color: rgba(140, 182, 0, 1);
        font-weight: 400;
        line-height: 2;
      }

      .footer-link {
        margin-top: 5px;
      }

      .footer-link-first {
        margin-top: 0;
      }

      .footer-holidays-block {
        display: flex;
        flex-direction: column;
        align-items: stretch;
        font-family:
          Arial,
          -apple-system,
          Roboto,
          Helvetica,
          sans-serif;
        font-size: 21px;
        line-height: 2;
      }

      .footer-holidays-links {
        margin-top: 19px;
        color: rgba(140, 182, 0, 1);
        font-weight: 400;
      }

      .footer-center-block {
        display: flex;
        width: 100%;
        flex-direction: column;
        align-items: stretch;
        font-family:
          Arial,
          -apple-system,
          Roboto,
          Helvetica,
          sans-serif;
        font-size: 21px;
        line-height: 2;
      }

      .footer-center-links {
        display: flex;
        margin-top: 19px;
        align-items: stretch;
        gap: 20px;
        color: rgba(140, 182, 0, 1);
        font-weight: 400;
        justify-content: space-between;
      }

      .footer-center-column {
        align-self: flex-start;
      }

      .footer-logo {
        aspect-ratio: 7.87;
        object-fit: contain;
        object-position: center;
        width: 220px;
        margin-top: 74px;
        max-width: 100%;
      }

      .footer-info-container {
        display: flex;
        margin-top: 30px;
        width: 100%;
        align-items: stretch;
        gap: 40px 100px;
        font-family:
          Arial,
          -apple-system,
          Roboto,
          Helvetica,
          sans-serif;
        font-weight: 400;
        flex-wrap: wrap;
      }

      .footer-description {
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
        gap: 40px 50px;
        color: rgba(255, 255, 255, 1);
        justify-content: flex-start;
        flex-wrap: wrap;
      }

      .footer-contact-block {
        align-self: stretch;
        display: flex;
        min-width: 240px;
        margin-top: auto;
        margin-bottom: auto;
        flex-direction: column;
        align-items: stretch;
        text-align: right;
        justify-content: flex-start;
        width: 268px;
      }

      .footer-contact-address {
        font-size: 16px;
        align-self: flex-end;
      }

      .footer-contact-phone {
        font-size: 26px;
        margin-top: 8px;
      }

      .footer-contact-block-alt {
        align-self: stretch;
        display: flex;
        margin-top: auto;
        margin-bottom: auto;
        flex-direction: column;
        align-items: stretch;
        justify-content: flex-start;
        width: 189px;
      }

      .footer-contact-address-alt {
        font-size: 16px;
        text-align: right;
      }

      .footer-contact-phone-alt {
        font-size: 26px;
        align-self: flex-end;
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

      .footer-copyright {
        color: rgba(166, 166, 166, 1);
        font-size: 14px;
        font-family:
          Arial,
          -apple-system,
          Roboto,
          Helvetica,
          sans-serif;
        font-weight: 400;
        margin-top: auto;
        margin-bottom: auto;
      }

      .footer-social {
        display: flex;
        align-items: stretch;
        gap: 32px;
      }

      .footer-social-text {
        color: rgba(166, 166, 166, 1);
        font-size: 14px;
        font-family:
          Arial,
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

      .footer-social-icons {
        display: flex;
        align-items: center;
        gap: 25px;
        justify-content: flex-start;
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

      .social-icon-alt {
        aspect-ratio: 1.15;
        object-fit: contain;
        object-position: center;
        width: 23px;
        align-self: stretch;
        margin-top: auto;
        margin-bottom: auto;
        flex-shrink: 0;
      }

      .social-icon-wide {
        aspect-ratio: 1.7;
        object-fit: contain;
        object-position: center;
        width: 34px;
        align-self: stretch;
        margin-top: auto;
        margin-bottom: auto;
        flex-shrink: 0;
      }

      .footer-credits {
        align-self: flex-start;
        display: flex;
        margin-top: 50px;
        align-items: flex-start;
        gap: 40px 50px;
        font-family:
          Rubik,
          -apple-system,
          Roboto,
          Helvetica,
          sans-serif;
        justify-content: flex-start;
      }

      .footer-dev {
        line-height: 1;
        width: 184px;
      }

      .footer-dev-label {
        color: rgba(66, 66, 66, 1);
        font-size: 12px;
        font-weight: 400;
      }

      .footer-dev-name {
        color: rgba(83, 83, 83, 1);
        font-size: 28px;
        font-weight: 600;
        margin-top: 10px;
      }

      .footer-design {
        color: rgba(66, 66, 66, 1);
        font-weight: 400;
        width: 187px;
      }

      .footer-design-label {
        font-size: 12px;
        line-height: 1;
      }

      .footer-design-text {
        margin-top: 10px;
        max-width: 100%;
        width: 187px;
        padding: 0 19px 15px 19px;
        font-size: 8px;
        white-space: nowrap;
        line-height: 12px;
      }

      /* Media queries */
      @media (max-width: 991px) {
        .top-nav {
          max-width: 100%;
          padding-left: 20px;
          padding-right: 20px;
        }

        .top-nav-links {
          max-width: 100%;
        }

        .header-section {
          max-width: 100%;
          padding-left: 20px;
          margin-top: 40px;
        }

        .header-container {
          max-width: 100%;
        }

        .header-content {
          max-width: 100%;
        }

        .main-nav {
          max-width: 100%;
        }

        .contact-info {
          max-width: 100%;
        }

        .breadcrumb {
          margin-left: 10px;
          margin-top: 40px;
        }

        .page-title {
          max-width: 100%;
        }

        .filter-section {
          margin-top: 40px;
        }

        .location-filter {
          max-width: 100%;
        }

        .filter-option-active {
          white-space: initial;
        }

        .genre-filter {
          max-width: 100%;
        }

        .genre-options {
          max-width: 100%;
        }

        .genre-option-dropdown {
          white-space: initial;
        }

        .date-day {
          white-space: initial;
        }

        .difficulty-option-selected {
          white-space: initial;
        }

        .difficulty-filter {
          max-width: 100%;
        }

        .calendar-section {
          max-width: 100%;
          margin-top: 40px;
        }

        .calendar-container {
          max-width: 100%;
        }

        .date-number {
          font-size: 40px;
        }

        .quests-section {
          max-width: 100%;
          margin-top: 40px;
        }

        .quests-container {
          max-width: 100%;
        }

        .quests-row {
          max-width: 100%;
          margin-top: 40px;
        }

        .quest-genre {
          white-space: initial;
        }

        .quest-card-content {
          padding-top: 100px;
        }

        .quest-times {
          white-space: initial;
        }

        .quest-time {
          white-space: initial;
        }

        .quest-time-unavailable {
          white-space: initial;
        }

        .quest-times-additional {
          white-space: initial;
        }

        .news-section {
          max-width: 100%;
          margin-top: 40px;
        }

        .news-title {
          max-width: 100%;
        }

        .news-container {
          max-width: 100%;
          margin-top: 40px;
        }

        .reviews-section {
          max-width: 100%;
          margin-top: -200px;
          padding-left: 20px;
          padding-top: 100px;
        }

        .reviews-container {
          max-width: 100%;
          margin-top: 40px;
        }

        .review-author-container {
          white-space: initial;
        }

        .footer-section {
          max-width: 100%;
        }

        .footer-divider {
          max-width: 100%;
        }

        .footer-container {
          max-width: 100%;
          margin-top: 40px;
        }

        .footer-content {
          max-width: 100%;
        }

        .footer-links-container {
          max-width: 100%;
        }

        .footer-links-row {
          flex-direction: column;
          align-items: stretch;
          gap: 0px;
        }

        .footer-column {
          width: 100%;
        }

        .footer-links-block {
          max-width: 100%;
          margin-top: 40px;
        }

        .footer-links-grid-row {
          flex-direction: column;
          align-items: stretch;
          gap: 0px;
        }

        .footer-links-grid-column {
          width: 100%;
        }

        .footer-links-list {
          margin-top: 40px;
        }

        .footer-holidays-block {
          margin-top: 40px;
        }

        .footer-center-block {
          margin-top: 40px;
        }

        .footer-logo {
          margin-top: 40px;
        }

        .footer-info-container {
          max-width: 100%;
        }

        .footer-description {
          max-width: 100%;
        }

        .footer-contacts {
          max-width: 100%;
        }

        .footer-bottom {
          max-width: 100%;
        }

        .footer-copyright {
          max-width: 100%;
        }

        .footer-credits {
          max-width: 100%;
          margin-top: 40px;
        }

        .footer-design-text {
          padding-left: 20px;
          white-space: initial;
        }
      }
    </style>
  </head>
  <body>
    <!-- Top navigation -->
    <nav class="top-nav">
      <div class="top-nav-links">
        <a href="#" class="top-nav-link">О центре</a>
        <a href="#" class="top-nav-link">Новости и акции</a>
        <a href="#" class="top-nav-link">Правила</a>
        <a href="#" class="top-nav-link">Программа лояльности</a>
        <a href="#" class="top-nav-link">Контакты</a>
      </div>
    </nav>

    <!-- Header section -->
    <header class="header-section">
      <div class="header-container">
        <img
          src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/4b0d896143abadd03d9820b4a5f2ad41ae75fa02bbb57e35086cca21bcba7b3f?placeholderIfAbsent=true"
          alt="Pandoroom Logo"
          class="logo"
        />
        <div class="header-content">
          <nav class="main-nav">
            <a href="#" class="main-nav-link">Квесты</a>
            <a href="#" class="main-nav-link">Праздники</a>
            <a href="#" class="main-nav-link">Кафе</a>
            <a href="#" class="main-nav-link">Игровая для детей</a>
            <img
              src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/3abe7aa3892700541b9b205c41078864bcd13de2651b08cb8dc1ad4d6ce978e1?placeholderIfAbsent=true"
              alt="Menu"
              class="menu-icon"
            />
          </nav>
          <div class="contact-info">
            <div class="contact-block">
              <div class="contact-address">
                Нижнепортовая, 1 / Посьетская, 27 стр. 2
              </div>
              <div class="contact-phone">8 423 202 26 96</div>
            </div>
            <div class="contact-block contact-block-alt">
              <div class="contact-address">Алеутская 17а</div>
              <div class="contact-phone">8 423 205 44 58</div>
            </div>
          </div>
        </div>
      </div>
      <a href="#" class="breadcrumb">Главная страница</a>
      <h1 class="page-title">Выберите квест во Владивостоке</h1>
    </header>

    <!-- Filter section -->
    <section class="filter-section">
      <div class="filter-container">
        <div class="location-filter">
          <div class="filter-option">Все филиалы</div>
          <div class="filter-option-active">Нижнепортовая</div>
          <div class="filter-option-active">Алеутская</div>
          <div class="filter-option-active">Посьетская</div>
        </div>
        <div class="genre-filter">
          <div class="genre-options">
            <div class="genre-option-active">Все жанры</div>
            <div class="genre-option-dropdown">
              <span class="dropdown-text">Приключение</span>
              <img
                src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/cccd49d584bbf53d126a52ca3bb7703cd437f283391f5d8722f8e87e8ed37fa8?placeholderIfAbsent=true"
                alt="Dropdown"
                class="dropdown-icon"
              />
            </div>
            <div class="genre-option-active">Экшн</div>
            <div class="filter-option-active">Мистический</div>
            <div class="genre-option-dropdown">
              <span class="dropdown-text">Хоррор</span>
              <img
                src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/cccd49d584bbf53d126a52ca3bb7703cd437f283391f5d8722f8e87e8ed37fa8?placeholderIfAbsent=true"
                alt="Dropdown"
                class="dropdown-icon"
              />
            </div>
            <div class="genre-option-active">Детектив</div>
            <div class="genre-option-active">Для детей</div>
          </div>
          <div class="actor-filter">Квесты с актерами</div>
        </div>
        <div class="difficulty-filter">
          <div class="difficulty-option">Любая сложность</div>
          <div class="difficulty-option-dropdown">
            <span class="difficulty-text">Легкие</span>
            <div class="difficulty-icons">
              <img
                src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/d1ad9b6c7cd8fc136585ef46c2d77d6152df53d2fd33603dd908c4c0348cd2f3?placeholderIfAbsent=true"
                alt="Easy"
                class="difficulty-icon"
              />
            </div>
          </div>
          <div class="difficulty-option-selected">
            <span class="dropdown-text">Средние</span>
            <img
              src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/5fb85a899d003e6278e4c189b3e6817c9b2daa6e252f95c96b3b3ef9d3d509f8?placeholderIfAbsent=true"
              alt="Medium"
              class="difficulty-icon-medium"
            />
            <img
              src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/c8aa5e824294b4e5a0cb84e5491c301304ab982f7be069eed75ad8537984aa19?placeholderIfAbsent=true"
              alt="Dropdown"
              class="difficulty-icon-dropdown"
            />
          </div>
          <div class="difficulty-option-dropdown">
            <span class="difficulty-text">Сложные</span>
            <img
              src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/053205a5139da803bbf366e0838e5c75d3add2967f2b5e8501419a000af32afd?placeholderIfAbsent=true"
              alt="Hard"
              class="difficulty-icon-hard"
            />
          </div>
          <div class="difficulty-option-very-hard">
            <span class="difficulty-text">Очень сложные</span>
            <img
              src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/25663886ca7065466a9f474d1b5f6f82eb323e1ab35b2384d8de84aae4d1ec0f?placeholderIfAbsent=true"
              alt="Very Hard"
              class="difficulty-icon-very-hard"
            />
          </div>
        </div>
      </div>
    </section>

    <!-- Calendar section -->
    <section class="calendar-section">
      <div class="calendar-container">
        <div class="calendar-date">
          <div class="date-number-container">
            <div class="date-number">17</div>
            <div class="date-month">/ 09</div>
          </div>
          <div class="date-day">вторник</div>
        </div>
        <div class="calendar-divider"></div>
        <div class="calendar-date">
          <div class="date-number-container">
            <div class="date-number">18</div>
            <div class="date-month">/ 09</div>
          </div>
          <div class="date-day">среда</div>
        </div>
        <div class="calendar-divider"></div>
        <div class="calendar-date">
          <div class="date-number-container">
            <div class="date-number">19</div>
            <div class="date-month">/ 09</div>
          </div>
          <div class="date-day">четверг</div>
        </div>
        <div class="calendar-divider"></div>
        <div class="calendar-date">
          <div class="date-number-container">
            <div class="date-number">20</div>
            <div class="date-month">/ 09</div>
          </div>
          <div class="date-day">пятница</div>
        </div>
        <div class="calendar-divider"></div>
        <div class="calendar-date">
          <div class="date-number-container">
            <div class="date-number date-weekend">21</div>
            <div class="date-month">/ 09</div>
          </div>
          <div class="date-day date-weekend">суббота</div>
        </div>
        <div class="calendar-divider"></div>
        <div class="calendar-date">
          <div class="date-number-container">
            <div class="date-number date-weekend">22</div>
            <div class="date-month">/ 09</div>
          </div>
          <div class="date-day date-weekend">воскресенье</div>
        </div>
        <div class="calendar-divider"></div>
        <div class="calendar-date">
          <div class="date-number-container">
            <div class="date-number">23</div>
            <div class="date-month">/ 09</div>
          </div>
          <div class="date-day">понедельник</div>
        </div>
        <div class="calendar-divider"></div>
        <div class="calendar-date">
          <div class="date-number-container">
            <div class="date-number">24</div>
            <div class="date-month">/ 09</div>
          </div>
          <div class="date-day">вторник</div>
        </div>
        <div class="calendar-divider"></div>
        <div class="calendar-date">
          <div class="date-number-container">
            <div class="date-number">25</div>
            <div class="date-month">/ 09</div>
          </div>
          <div class="date-day">среда</div>
        </div>
        <div class="calendar-divider"></div>
        <div class="calendar-date">
          <div class="date-number-container">
            <div class="date-number">26</div>
            <div class="date-month">/ 09</div>
          </div>
          <div class="date-day">четверг</div>
        </div>
        <div class="calendar-divider"></div>
        <div class="calendar-date">
          <div class="date-number-container">
            <div class="date-number">27</div>
            <div class="date-month">/ 09</div>
          </div>
          <div class="date-day">пятница</div>
        </div>
        <div class="calendar-divider"></div>
        <div class="calendar-date">
          <div class="date-number-container">
            <div class="date-number date-weekend">28</div>
          </div>
          <div class="date-day date-weekend">суббота</div>
        </div>
      </div>
    </section>

    <!-- Quest cards section -->
    <section class="quests-section">
      <div class="quests-container">
        <!-- First row of quests -->
        <div class="quests-row">
          <article class="quest-card">
            <div class="quest-card-content">
              <img
                src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/a55e45ec563cd85aa45057526e4eea8f1c9ea00e7ab0d00f10baf6b1ccb6883a?placeholderIfAbsent=true"
                alt="Гарри Поттер и Философский камень"
                class="quest-image"
              />
              <div class="quest-genre">приключение</div>
              <h3 class="quest-title">
                Гарри Поттер<br />и Философский камень
              </h3>
              <div class="quest-info">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/76672e75e457a2297873f17a48450d08a952b4d2cd2f5a84ad1d62a76b2aa593?placeholderIfAbsent=true"
                  alt="Quest Info"
                  class="quest-info-icon"
                />
                <span class="quest-info-text">60 минут</span>
                <span class="quest-info-text">2-6 игроков</span>
                <span class="quest-info-text">12+</span>
              </div>
              <div class="quest-times">
                <div class="quest-time-unavailable">10:30</div>
                <div class="quest-time">11:50</div>
                <div class="quest-time">13:10</div>
                <div class="quest-time">14:30</div>
                <div class="quest-time">15:50</div>
              </div>
              <div class="quest-times-additional">
                <div class="quest-time">17:10</div>
                <div class="quest-time">18:30</div>
                <div class="quest-time-unavailable">19:50</div>
                <div class="quest-time">21:10</div>
              </div>
            </div>
          </article>

          <article class="quest-card">
            <div class="quest-card-content">
              <img
                src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/c1e52a6f44df3237e14b46e64482b1d7c92a18d514c696f923b0e82d766ea793?placeholderIfAbsent=true"
                alt="Чумной доктор"
                class="quest-image"
              />
              <div class="quest-genre">мистический</div>
              <h3 class="quest-title">Чумной доктор</h3>
              <div class="quest-info">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/a9a292b6de00ee53866d730e6a48e92057e25f0c5eebeb468e8f747f1bce81e1?placeholderIfAbsent=true"
                  alt="Quest Info"
                  class="quest-info-icon"
                />
                <span class="quest-info-text">60 минут</span>
                <span class="quest-info-text">2-6 игроков</span>
                <span class="quest-info-text">12+</span>
              </div>
              <div class="quest-times">
                <div class="quest-time-unavailable">10:30</div>
                <div class="quest-time">11:50</div>
                <div class="quest-time">13:10</div>
                <div class="quest-time">14:30</div>
                <div class="quest-time">15:50</div>
              </div>
              <div class="quest-times-additional">
                <div class="quest-time">17:10</div>
                <div class="quest-time">18:30</div>
                <div class="quest-time-unavailable">19:50</div>
                <div class="quest-time">21:10</div>
              </div>
            </div>
          </article>

          <article class="quest-card">
            <div class="quest-card-content">
              <img
                src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/c1d3d21cab576751c1122d400855e053f20006fc2418d6b5c7a765f54dd62b82?placeholderIfAbsent=true"
                alt="Сокровища пиратов"
                class="quest-image"
              />
              <div class="quest-genre">приключение</div>
              <h3 class="quest-title">Сокровища пиратов</h3>
              <div class="quest-info">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/11425b141117cc6dca0994f2c6974206a01d396be812934d0a547726815bd9ee?placeholderIfAbsent=true"
                  alt="Quest Info"
                  class="quest-info-icon"
                />
                <span class="quest-info-text">60 минут</span>
                <span class="quest-info-text">2-6 игроков</span>
                <span class="quest-info-text">12+</span>
              </div>
              <div class="quest-times">
                <div class="quest-time-unavailable">10:30</div>
                <div class="quest-time">11:50</div>
                <div class="quest-time">13:10</div>
                <div class="quest-time">14:30</div>
                <div class="quest-time">15:50</div>
              </div>
              <div class="quest-times-additional">
                <div class="quest-time">17:10</div>
                <div class="quest-time">18:30</div>
                <div class="quest-time-unavailable">19:50</div>
                <div class="quest-time">21:10</div>
              </div>
            </div>
          </article>

          <article class="quest-card">
            <div class="quest-card-content">
              <img
                src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/2894ca37b5f7f91614d9f60941837419f0fff8f0bb04acd0ea068939e46f799b?placeholderIfAbsent=true"
                alt="Resident Evil"
                class="quest-image"
              />
              <div class="quest-genre">хоррор</div>
              <h3 class="quest-title">Resident Evil</h3>
              <div class="quest-info">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/de8d7afcaba6ee5dd8cecfe7c647682d57f4cd4547d0dfbef975d7fa662b036d?placeholderIfAbsent=true"
                  alt="Quest Info"
                  class="quest-info-icon"
                />
                <span class="quest-info-text">80 минут</span>
                <span class="quest-info-text">2-6 игроков</span>
                <span class="quest-info-text">12+</span>
              </div>
              <div class="quest-times">
                <div class="quest-time-unavailable">10:30</div>
                <div class="quest-time">11:50</div>
                <div class="quest-time">13:10</div>
                <div class="quest-time">14:30</div>
                <div class="quest-time">15:50</div>
              </div>
              <div class="quest-times-additional">
                <div class="quest-time">17:10</div>
                <div class="quest-time">18:30</div>
                <div class="quest-time-unavailable">19:50</div>
                <div class="quest-time">21:10</div>
              </div>
            </div>
          </article>
        </div>

        <!-- Second row of quests -->
        <div class="quests-row">
          <article class="quest-card">
            <div class="quest-card-content">
              <img
                src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/d2cde876f43ef37ceb824ab8e805d3b6a8a297e652bc5fc859d4be6e21cb397b?placeholderIfAbsent=true"
                alt="Код Да Винчи"
                class="quest-image"
              />
              <div class="quest-genre">приключение</div>
              <h3 class="quest-title">Код Да Винчи</h3>
              <div class="quest-info">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/81266fdd084cc1b536dcb42704de32cc859055e97d4beb96f5259d43a80f17ee?placeholderIfAbsent=true"
                  alt="Quest Info"
                  class="quest-info-icon"
                />
                <span class="quest-info-text">60 минут</span>
                <span class="quest-info-text">2-6 игроков</span>
                <span class="quest-info-text">12+</span>
              </div>
              <div class="quest-times">
                <div class="quest-time-unavailable">10:30</div>
                <div class="quest-time">11:50</div>
                <div class="quest-time">13:10</div>
                <div class="quest-time">14:30</div>
                <div class="quest-time">15:50</div>
              </div>
              <div class="quest-times-additional">
                <div class="quest-time">17:10</div>
                <div class="quest-time">18:30</div>
                <div class="quest-time-unavailable">19:50</div>
                <div class="quest-time">21:10</div>
              </div>
            </div>
          </article>

          <article class="quest-card">
            <div class="quest-card-content">
              <img
                src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/b6f3383c536d6edd40b997619ef053b06a04a5018b94845ea79dd3f8a41b7d8b?placeholderIfAbsent=true"
                alt="Инквизиция"
                class="quest-image"
              />
              <div class="quest-genre">Мистический</div>
              <h3 class="quest-title">Инквизиция</h3>
              <div class="quest-info">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/dff678fbd99340646c8d9a398cd2486cc9b5967902120ce4641822ff2a1e962b?placeholderIfAbsent=true"
                  alt="Quest Info"
                  class="quest-info-icon"
                />
                <span class="quest-info-text">60 минут</span>
                <span class="quest-info-text">2-6 игроков</span>
                <span class="quest-info-text">12+</span>
              </div>
              <div class="quest-times">
                <div class="quest-time-unavailable">10:30</div>
                <div class="quest-time">11:50</div>
                <div class="quest-time">13:10</div>
                <div class="quest-time">14:30</div>
                <div class="quest-time">15:50</div>
              </div>
              <div class="quest-times-additional">
                <div class="quest-time">17:10</div>
                <div class="quest-time">18:30</div>
                <div class="quest-time-unavailable">19:50</div>
                <div class="quest-time">21:10</div>
              </div>
            </div>
          </article>

          <article class="quest-card">
            <div class="quest-card-content">
              <img
                src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/bf1e56e8acd0ea283aa78af8072d35594b218013b7a9ef8ab03caa747b740191?placeholderIfAbsent=true"
                alt="Silent Hill"
                class="quest-image"
              />
              <div class="quest-genre">хоррор</div>
              <h3 class="quest-title">Silent Hill</h3>
              <div class="quest-info">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/f140a47eade30e02fafabde99894545c99ad69ee5d98e768c57c7f9f73843057?placeholderIfAbsent=true"
                  alt="Quest Info"
                  class="quest-info-icon"
                />
                <span class="quest-info-text">80 минут</span>
                <span class="quest-info-text">2-6 игроков</span>
                <span class="quest-info-text">12+</span>
              </div>
              <div class="quest-times">
                <div class="quest-time-unavailable">10:30</div>
                <div class="quest-time">11:50</div>
                <div class="quest-time">13:10</div>
                <div class="quest-time">14:30</div>
                <div class="quest-time">15:50</div>
              </div>
              <div class="quest-times-additional">
                <div class="quest-time">17:10</div>
                <div class="quest-time">18:30</div>
                <div class="quest-time-unavailable">19:50</div>
                <div class="quest-time">21:10</div>
              </div>
            </div>
          </article>

          <article class="quest-card">
            <div class="quest-card-content">
              <img
                src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/d8ea67a552d8bf7b029c946e058e9a9db20d6041b41e0ed3d7bec2b291ce9332?placeholderIfAbsent=true"
                alt="Секретный эксперимент"
                class="quest-image"
              />
              <div class="quest-genre">Детектив</div>
              <h3 class="quest-title">Секретный эксперимент</h3>
              <div class="quest-info">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/c17964bd73274e38631b61077d50fb7d782dbf7f1d2c1a5f90e62834f37bd76d?placeholderIfAbsent=true"
                  alt="Quest Info"
                  class="quest-info-icon"
                />
                <span class="quest-info-text">60 минут</span>
                <span class="quest-info-text">2-6 игроков</span>
                <span class="quest-info-text">12+</span>
              </div>
              <div class="quest-times">
                <div class="quest-time-unavailable">10:30</div>
                <div class="quest-time">11:50</div>
                <div class="quest-time">13:10</div>
                <div class="quest-time">14:30</div>
                <div class="quest-time">15:50</div>
              </div>
              <div class="quest-times-additional">
                <div class="quest-time">17:10</div>
                <div class="quest-time">18:30</div>
                <div class="quest-time-unavailable">19:50</div>
                <div class="quest-time">21:10</div>
              </div>
            </div>
          </article>
        </div>

        <!-- Third row of quests -->
        <div class="quests-row">
          <article class="quest-card">
            <div class="quest-card-content">
              <img
                src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/d2cde876f43ef37ceb824ab8e805d3b6a8a297e652bc5fc859d4be6e21cb397b?placeholderIfAbsent=true"
                alt="Тайна старого театра"
                class="quest-image"
              />
              <div class="quest-genre">Мистический</div>
              <h3 class="quest-title">Тайна старого театра</h3>
              <div class="quest-info">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/ab0ed726d48f5e87a91cfa087f9bf632a8602b5d7a58bb0cd4830ea711f42c14?placeholderIfAbsent=true"
                  alt="Quest Info"
                  class="quest-info-icon"
                />
                <span class="quest-info-text">80 минут</span>
                <span class="quest-info-text">2-6 игроков</span>
                <span class="quest-info-text">12+</span>
              </div>
              <div class="quest-times">
                <div class="quest-time-unavailable">10:30</div>
                <div class="quest-time">11:50</div>
                <div class="quest-time">13:10</div>
                <div class="quest-time">14:30</div>
                <div class="quest-time">15:50</div>
              </div>
              <div class="quest-times-additional">
                <div class="quest-time">17:10</div>
                <div class="quest-time">18:30</div>
                <div class="quest-time-unavailable">19:50</div>
                <div class="quest-time">21:10</div>
              </div>
            </div>
          </article>

          <article class="quest-card">
            <div class="quest-card-content">
              <img
                src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/f10b3a939963f2708430412e35ecb02a3bcfc0fd2c9d67c9e77c20d1e23374da?placeholderIfAbsent=true"
                alt="Охотники за ��ривидениями"
                class="quest-image"
              />
              <div class="quest-genre">Мистический</div>
              <h3 class="quest-title">Охотники за привидениями</h3>
              <div class="quest-info">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/dff678fbd99340646c8d9a398cd2486cc9b5967902120ce4641822ff2a1e962b?placeholderIfAbsent=true"
                  alt="Quest Info"
                  class="quest-info-icon"
                />
                <span class="quest-info-text">60 минут</span>
                <span class="quest-info-text">2-6 игроков</span>
                <span class="quest-info-text">12+</span>
              </div>
              <div class="quest-times">
                <div class="quest-time-unavailable">10:30</div>
                <div class="quest-time">11:50</div>
                <div class="quest-time">13:10</div>
                <div class="quest-time">14:30</div>
                <div class="quest-time">15:50</div>
              </div>
              <div class="quest-times-additional">
                <div class="quest-time">17:10</div>
                <div class="quest-time">18:30</div>
                <div class="quest-time-unavailable">19:50</div>
                <div class="quest-time">21:10</div>
              </div>
            </div>
          </article>

          <article class="quest-card">
            <div class="quest-card-content">
              <img
                src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/e7f3b18de9d6d574cba4c4d5582501faa2764f4a011122274cfb049c5c977edc?placeholderIfAbsent=true"
                alt="Лазертаг"
                class="quest-image"
              />
              <div class="quest-genre">Экшн</div>
              <h3 class="quest-title">Лазертаг</h3>
              <div class="quest-info">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/5d7d89b55c4f1b76a04e82394254213a9fbd3095c5f4f280ad5c13dfe1f63675?placeholderIfAbsent=true"
                  alt="Quest Info"
                  class="quest-info-icon"
                />
                <span class="quest-info-text">60 минут</span>
                <span class="quest-info-text">до 14 игроков</span>
                <span class="quest-info-text">12+</span>
              </div>
              <div class="quest-times">
                <div class="quest-time-unavailable">10:30</div>
                <div class="quest-time">11:50</div>
                <div class="quest-time">13:10</div>
                <div class="quest-time">14:30</div>
                <div class="quest-time">15:50</div>
              </div>
              <div class="quest-times-additional">
                <div class="quest-time">17:10</div>
                <div class="quest-time">18:30</div>
                <div class="quest-time-unavailable">19:50</div>
                <div class="quest-time">21:10</div>
              </div>
            </div>
          </article>

          <article class="quest-card">
            <div class="quest-card-content">
              <img
                src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/be4341b2f25f70bf6db56005a3055983645a1122c1286695b2bcc48b5aa63971?placeholderIfAbsent=true"
                alt="Ограбление века"
                class="quest-image"
              />
              <div class="quest-genre">Экшн</div>
              <h3 class="quest-title">Ограбление века</h3>
              <div class="quest-info">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/9928c6891fc80b7d4b95a46891b53039ab7284afbf6ddb1c125094bab31fad71?placeholderIfAbsent=true"
                  alt="Quest Info"
                  class="quest-info-icon"
                />
                <span class="quest-info-text">60 минут</span>
                <span class="quest-info-text">2-6 игроков</span>
                <span class="quest-info-text">6+</span>
              </div>
              <div class="quest-times">
                <div class="quest-time-unavailable">10:30</div>
                <div class="quest-time">11:50</div>
                <div class="quest-time">13:10</div>
                <div class="quest-time">14:30</div>
                <div class="quest-time">15:50</div>
              </div>
              <div class="quest-times-additional">
                <div class="quest-time">17:10</div>
                <div class="quest-time">18:30</div>
                <div class="quest-time-unavailable">19:50</div>
                <div class="quest-time">21:10</div>
              </div>
            </div>
          </article>
        </div>

        <!-- Fourth row of quests -->
        <div class="quests-row">
          <article class="quest-card">
            <div class="quest-card-content">
              <img
                src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/86bd3954a27e1285436ebb5a9c3914101ceb886a0ad54dbf0b250681471248dc?placeholderIfAbsent=true"
                alt="Вий"
                class="quest-image"
              />
              <div class="quest-genre">хоррор</div>
              <h3 class="quest-title">Вий</h3>
              <div class="quest-info">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/5852bd6a212277eb712ab035d4bc622d349397b58ce82b988bf917270b580f8f?placeholderIfAbsent=true"
                  alt="Quest Info"
                  class="quest-info-icon"
                />
                <span class="quest-info-text">60 минут</span>
                <span class="quest-info-text">2-6 игроков</span>
                <span class="quest-info-text">12+</span>
              </div>
              <div class="quest-times">
                <div class="quest-time-unavailable">10:30</div>
                <div class="quest-time">11:50</div>
                <div class="quest-time">13:10</div>
                <div class="quest-time">14:30</div>
                <div class="quest-time">15:50</div>
              </div>
              <div class="quest-times-additional">
                <div class="quest-time">17:10</div>
                <div class="quest-time">18:30</div>
                <div class="quest-time-unavailable">19:50</div>
                <div class="quest-time">21:10</div>
              </div>
            </div>
          </article>

          <article class="quest-card">
            <div class="quest-card-content">
              <img
                src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/47d3b4e65f221f80d1a3caabbb70266d837ea9ffd7fa79379adf32f719a62188?placeholderIfAbsent=true"
                alt="Джуманджи"
                class="quest-image"
              />
              <div class="quest-genre">хоррор</div>
              <h3 class="quest-title">Джуманджи</h3>
              <div class="quest-info">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/81266fdd084cc1b536dcb42704de32cc859055e97d4beb96f5259d43a80f17ee?placeholderIfAbsent=true"
                  alt="Quest Info"
                  class="quest-info-icon"
                />
                <span class="quest-info-text">80 минут</span>
                <span class="quest-info-text">2-6 игроков</span>
                <span class="quest-info-text">12+</span>
              </div>
              <div class="quest-times">
                <div class="quest-time-unavailable">10:30</div>
                <div class="quest-time">11:50</div>
                <div class="quest-time">13:10</div>
                <div class="quest-time">14:30</div>
                <div class="quest-time">15:50</div>
              </div>
              <div class="quest-times-additional">
                <div class="quest-time">17:10</div>
                <div class="quest-time">18:30</div>
                <div class="quest-time-unavailable">19:50</div>
                <div class="quest-time">21:10</div>
              </div>
            </div>
          </article>
        </div>
      </div>
    </section>

    <!-- News section -->
    <section class="news-section">
      <h2 class="news-title">Новости и акции</h2>
      <div class="news-container">
        <article class="news-card">
          <img
            src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/4305c1708dbdf7fca93f843be3238d4ac82954505dc24175e5390d95e520979a?placeholderIfAbsent=true"
            alt="День рождения в квесте"
            class="news-image"
          />
          <div class="news-content">
            <div class="news-header">
              <div class="news-date">25 августа 2024</div>
              <h3 class="news-headline">День рождения в квесте</h3>
            </div>
            <p class="news-text">
              Праздник в квесте — это такой праздник, который останется в памяти
              навсегда у вас и вашего ребенка! Хватит скучных сценариев ...
            </p>
            <a href="#" class="news-link">подробнее</a>
          </div>
        </article>

        <article class="news-card">
          <img
            src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/d8bb86c88ed9057634833eec04992a8d75140976ef4fb4ecc423e1496e75d5d9?placeholderIfAbsent=true"
            alt="Новый квест — Мумия"
            class="news-image"
          />
          <div class="news-content">
            <div class="news-header">
              <div class="news-date">21 июня 2024</div>
              <h3 class="news-headline">Новый квест — Мумия</h3>
            </div>
            <p class="news-text">
              А мы уже готовим к открытию новый квест🔥🔥🔥 "Группа археологов
              при раскопках нашла вход в гробницу, где в начале пути ...
            </p>
            <a href="#" class="news-link">подробнее</a>
          </div>
        </article>

        <article class="news-card">
          <img
            src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/150c45a58fc6822a6e18049d2eb241934c96813d9facb9eac309add7ff21fdcd?placeholderIfAbsent=true"
            alt="Скидка 30% на «Тайна Теслы»"
            class="news-image"
          />
          <div class="news-content">
            <div class="news-header">
              <div class="news-date">11 июня 2024</div>
              <h3 class="news-headline">Скидка 30% на «Тайна Теслы»</h3>
            </div>
            <p class="news-text">
              Только на этой неделе у вас есть последняя возможность пройти
              квест «Тайна Теслы» со скидкой 30%🔥🔥🔥...
            </p>
            <a href="#" class="news-link">подробнее</a>
          </div>
        </article>

        <article class="news-card">
          <img
            src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/cf6fd94ceff476cbc99b8ae2d58213c8f3c3105e05b26e44859a138abf6823d0?placeholderIfAbsent=true"
            alt="Дарим квест весь май"
            class="news-image"
          />
          <div class="news-content">
            <div class="news-header">
              <div class="news-date">13 мая 2024</div>
              <h3 class="news-headline">Дарим квест весь май</h3>
            </div>
            <p class="news-text">
              Продляем акцию! На День Рождения принято дарить подарки💛PANDOROOM
              дарит квест «Тайна Теслы» при бронировании праздника в мае ...
            </p>
            <a href="#" class="news-link">подробнее</a>
          </div>
        </article>
      </div>
    </section>

    <!-- Reviews section -->
    <section class="reviews-section">
      <img
        src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/75943deecc6258316c9b611f2f2ddbabe8215ce530f46869cbf9194a7524675a?placeholderIfAbsent=true"
        alt="Reviews Background"
        class="reviews-background"
      />
      <h2 class="reviews-title">Отзывы гостей</h2>
      <div class="reviews-container">
        <article class="review-card">
          <div class="review-content">
            <div class="review-header">
              <div class="review-author-container">
                <div class="review-author">Кристина</div>
                <div class="review-date">12 августа 2024</div>
              </div>
              <div class="review-rating">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/3be351afbe9298a8f0f7326b8b8a2bb823027da84a26c2e06a0ae4c1c8b40adc?placeholderIfAbsent=true"
                  alt="Star"
                  class="rating-star"
                />
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/3be351afbe9298a8f0f7326b8b8a2bb823027da84a26c2e06a0ae4c1c8b40adc?placeholderIfAbsent=true"
                  alt="Star"
                  class="rating-star"
                />
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/3be351afbe9298a8f0f7326b8b8a2bb823027da84a26c2e06a0ae4c1c8b40adc?placeholderIfAbsent=true"
                  alt="Star"
                  class="rating-star"
                />
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/3be351afbe9298a8f0f7326b8b8a2bb823027da84a26c2e06a0ae4c1c8b40adc?placeholderIfAbsent=true"
                  alt="Star"
                  class="rating-star"
                />
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/3be351afbe9298a8f0f7326b8b8a2bb823027da84a26c2e06a0ae4c1c8b40adc?placeholderIfAbsent=true"
                  alt="Star"
                  class="rating-star"
                />
              </div>
            </div>
            <p class="review-text">
              Вот уже много лет отмечаем ребёнку здесь день рождение. Это
              наверное единственное место в городе, где можно ��лассно провести
              время. Спасибо вам большое.
            </p>
          </div>
        </article>

        <article class="review-card">
          <div class="review-content">
            <div class="review-header">
              <div class="review-author-container">
                <div class="review-author">Пелагея Ганчинова</div>
                <div class="review-date">9 августа 2024</div>
              </div>
              <div class="review-rating">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/3be351afbe9298a8f0f7326b8b8a2bb823027da84a26c2e06a0ae4c1c8b40adc?placeholderIfAbsent=true"
                  alt="Star"
                  class="rating-star"
                />
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/3be351afbe9298a8f0f7326b8b8a2bb823027da84a26c2e06a0ae4c1c8b40adc?placeholderIfAbsent=true"
                  alt="Star"
                  class="rating-star"
                />
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/3be351afbe9298a8f0f7326b8b8a2bb823027da84a26c2e06a0ae4c1c8b40adc?placeholderIfAbsent=true"
                  alt="Star"
                  class="rating-star"
                />
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/3be351afbe9298a8f0f7326b8b8a2bb823027da84a26c2e06a0ae4c1c8b40adc?placeholderIfAbsent=true"
                  alt="Star"
                  class="rating-star"
                />
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/3be351afbe9298a8f0f7326b8b8a2bb823027da84a26c2e06a0ae4c1c8b40adc?placeholderIfAbsent=true"
                  alt="Star"
                  class="rating-star"
                />
              </div>
            </div>
            <p class="review-text">
              Были в данном заведении , все было супер . Сильно хочу отметить
              официанта Ивана , приятный , вежливый, может посоветовать блюда ,
              официант Ирина так же очень открытая и позитивная .🥰
            </p>
          </div>
        </article>

        <article class="review-card">
          <div class="review-content">
            <div class="review-header">
              <div class="review-author-container">
                <div class="review-author">Роксолана Скрипка</div>
                <div class="review-date">9 августа 2024</div>
              </div>
              <div class="review-rating">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/3be351afbe9298a8f0f7326b8b8a2bb823027da84a26c2e06a0ae4c1c8b40adc?placeholderIfAbsent=true"
                  alt="Star"
                  class="rating-star"
                />
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/3be351afbe9298a8f0f7326b8b8a2bb823027da84a26c2e06a0ae4c1c8b40adc?placeholderIfAbsent=true"
                  alt="Star"
                  class="rating-star"
                />
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/3be351afbe9298a8f0f7326b8b8a2bb823027da84a26c2e06a0ae4c1c8b40adc?placeholderIfAbsent=true"
                  alt="Star"
                  class="rating-star"
                />
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/3be351afbe9298a8f0f7326b8b8a2bb823027da84a26c2e06a0ae4c1c8b40adc?placeholderIfAbsent=true"
                  alt="Star"
                  class="rating-star"
                />
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/3be351afbe9298a8f0f7326b8b8a2bb823027da84a26c2e06a0ae4c1c8b40adc?placeholderIfAbsent=true"
                  alt="Star"
                  class="rating-star"
                />
              </div>
            </div>
            <p class="review-text">
              <span
                style="
                  font-family:
                    Manrope,
                    -apple-system,
                    Roboto,
                    Helvetica,
                    sans-serif;
                "
                >Отличное место для времяпровождения с друзьями, семьей или со
                своей половинкой) Очень много игр на выбор. Отличная кухня и
                разнообразный бар🍷 Иван очень вежливый официант, всег</span
              >
              <span
                style="
                  font-family:
                    Manrope,
                    -apple-system,
                    Roboto,
                    Helvetica,
                    sans-serif;
                  text-decoration: underline;
                "
                >..</span
              >.
            </p>
          </div>
        </article>

        <article class="review-card">
          <div class="review-content">
            <div class="review-header">
              <div class="review-author-container">
                <div class="review-author">​Карина Белослюдцева</div>
                <div class="review-date">9 августа 2024</div>
              </div>
              <div class="review-rating">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/3be351afbe9298a8f0f7326b8b8a2bb823027da84a26c2e06a0ae4c1c8b40adc?placeholderIfAbsent=true"
                  alt="Star"
                  class="rating-star"
                />
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/3be351afbe9298a8f0f7326b8b8a2bb823027da84a26c2e06a0ae4c1c8b40adc?placeholderIfAbsent=true"
                  alt="Star"
                  class="rating-star"
                />
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/3be351afbe9298a8f0f7326b8b8a2bb823027da84a26c2e06a0ae4c1c8b40adc?placeholderIfAbsent=true"
                  alt="Star"
                  class="rating-star"
                />
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/3be351afbe9298a8f0f7326b8b8a2bb823027da84a26c2e06a0ae4c1c8b40adc?placeholderIfAbsent=true"
                  alt="Star"
                  class="rating-star"
                />
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/3be351afbe9298a8f0f7326b8b8a2bb823027da84a26c2e06a0ae4c1c8b40adc?placeholderIfAbsent=true"
                  alt="Star"
                  class="rating-star"
                />
              </div>
            </div>
            <p class="review-text">
              <span
                style="
                  font-family:
                    Manrope,
                    -apple-system,
                    Roboto,
                    Helvetica,
                    sans-serif;
                "
                >Спасибо большое за хорошо проведённый вечер! Отличный персонал,
                официант Иван очень внимательный и вежливый, также официант
                Ирина очень открытая и позитивная. Настроение на выс</span
              >
              <span
                style="
                  font-family:
                    Manrope,
                    -apple-system,
                    Roboto,
                    Helvetica,
                    sans-serif;
                  text-decoration: underline;
                "
                >...</span
              >
            </p>
          </div>
        </article>

        <article class="review-card">
          <div class="review-content">
            <div class="review-header">
              <div class="review-author">Снежана</div>
              <div class="review-rating">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/3be351afbe9298a8f0f7326b8b8a2bb823027da84a26c2e06a0ae4c1c8b40adc?placeholderIfAbsent=true"
                  alt="Star"
                  class="rating-star"
                />
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/6e78282978155c27d16c4d0d45a5b973bb88931da6e8d76f49af17d59e3a8155?placeholderIfAbsent=true"
                  alt="Half Star"
                  class="rating-star"
                />
              </div>
            </div>
            <p class="review-text">
              Были на квест�� "Властелин колец". Квест интересный, сложность
              средняя, есть бесконечное число подсказок)) Квест проходить
              интересно и весело. На память бесплатно сделали фото и даже
            </p>
          </div>
        </article>
      </div>
    </section>

    <!-- Footer section -->
    <footer class="footer-section">
      <div class="footer-divider"></div>
      <div class="footer-container">
        <div class="footer-content">
          <div class="footer-links-container">
            <div class="footer-links-row">
              <div class="footer-column">
                <div class="footer-links-block">
                  <h3 class="footer-category">Квесты во Владивостоке</h3>
                  <div class="footer-links-grid">
                    <div class="footer-links-grid-row">
                      <div class="footer-links-grid-column">
                        <div class="footer-links-list">
                          <a href="#" class="footer-link footer-link-first"
                            >Все квесты</a
                          >
                          <a href="#" class="footer-link">Квесты с актерами</a>
                          <a href="#" class="footer-link">Квесты без актеров</a>
                          <a href="#" class="footer-link">Детские квесты</a>
                          <a href="#" class="footer-link">Квесты-приключения</a>
                        </div>
                      </div>
                      <div
                        class="footer-links-grid-column footer-links-grid-column-right"
                      >
                        <div class="footer-links-list">
                          <a href="#" class="footer-link footer-link-first"
                            >Квесты-экшены</a
                          >
                          <a href="#" class="footer-link">Мистические квесты</a>
                          <a href="#" class="footer-link">Квесты-хорроры</a>
                          <a href="#" class="footer-link">Квесты-детективы</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="footer-column footer-column-middle">
                <div class="footer-holidays-block">
                  <h3 class="footer-category">Праздники во Владивостоке</h3>
                  <div class="footer-holidays-links">
                    <a href="#" class="footer-link footer-link-first"
                      >Праздник для малышей</a
                    >
                    <a href="#" class="footer-link"
                      >Праздник для детей 6-10 лет</a
                    >
                    <a href="#" class="footer-link"
                      >Праздник для детей 10-15 лет</a
                    >
                    <a href="#" class="footer-link"
                      ><br />Индивидуальный расчет праздника</a
                    >
                  </div>
                </div>
              </div>
              <div class="footer-column footer-column-right">
                <div class="footer-center-block">
                  <h3 class="footer-category">Семейный центр Пандорум</h3>
                  <div class="footer-center-links">
                    <div>
                      <a href="#" class="footer-link footer-link-first"
                        >О центре</a
                      >
                      <a href="#" class="footer-link">Кафе</a>
                      <a href="#" class="footer-link">Игровая</a>
                      <a href="#" class="footer-link">Меню</a>
                      <a href="#" class="footer-link">Правила</a>
                    </div>
                    <div class="footer-center-column">
                      <a href="#" class="footer-link footer-link-first"
                        >Программа лояльности</a
                      >
                      <a href="#" class="footer-link">Акции и новости</a>
                      <a href="#" class="footer-link">Контакты</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <img
            src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/3785f5f0f1ec4efd8da4f27cdc3c50f87d0f18d19295fc71ed6e0493b56fd0c2?placeholderIfAbsent=true"
            alt="Pandoroom Logo"
            class="footer-logo"
          />
          <div class="footer-info-container">
            <p class="footer-description">
              Семейное кафе и квесты Pandoroom (Пандорум) – это огромный центр
              отдыха для семьи, компаний друзей и детей. В наших филиалах Вас
              ждет: три зала фирменного кафе, огромный мир квестов для всех
              возрастов, а также, получившая популярность, батальная игра для
              детей и взрослых – Лазертаг.
            </p>
            <div class="footer-contacts">
              <div class="footer-contact-block">
                <div class="footer-contact-address">
                  Нижнепортовая, 1 / Посьетская, 27 стр. 2
                </div>
                <div class="footer-contact-phone">8 423 202 26 96</div>
              </div>
              <div class="footer-contact-block-alt">
                <div class="footer-contact-address-alt">Алеутская 17а</div>
                <div class="footer-contact-phone-alt">8 423 205 44 58</div>
              </div>
            </div>
          </div>
          <div class="footer-bottom">
            <div class="footer-copyright">
              2015 — 2024 | ООО «Пандорум» |
              <span
                style="
                  text-decoration: underline;
                  color: rgba(166, 166, 166, 1);
                "
                >Политика конфиденциальности</span
              >
            </div>
            <div class="footer-social">
              <div class="footer-social-text">
                следите за нами в соц.сетях —
              </div>
              <div class="footer-social-icons">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/6c9f0706a83d1fe80b314a35b1ceaaeaca2674f70346cb9915aa1455a23d764f?placeholderIfAbsent=true"
                  alt="Social Media"
                  class="social-icon"
                />
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/c8cc933960a78f87186cf0c15ff13625badcd8b4666e0bb0f4c7e041e7a177c1?placeholderIfAbsent=true"
                  alt="Social Media"
                  class="social-icon-alt"
                />
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/9619b4f14ec5406ba10277256bbc5a9f/10294b062379eb664174d0724ed71d952478e3fa3562bed6be5561083bafb2e4?placeholderIfAbsent=true"
                  alt="Social Media"
                  class="social-icon-wide"
                />
              </div>
            </div>
          </div>
        </div>
        <div class="footer-credits">
          <div class="footer-dev">
            <div class="footer-dev-label">Разработка сайта —</div>
            <div class="footer-dev-name">Shelikhov.me</div>
          </div>
          <div class="footer-design">
            <div class="footer-design-label">Дизайн сайта —</div>
            <div class="footer-design-text">
              Дизайн<br />Маркетинг<br />Контент
            </div>
          </div>
        </div>
      </div>
    </footer>

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
            el.setAttribute("space", 132);
          });

          document.querySelectorAll("[data-el='div-2']").forEach((el) => {
            el.setAttribute("space", 42);
          });

          destroyAnyNodes();

          pendingUpdate = false;
        }

        // Update with initial state on first load
        update();
      })();
    </script>
  </body>
</html>
