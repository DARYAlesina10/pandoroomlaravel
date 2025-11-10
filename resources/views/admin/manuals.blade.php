@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="mb-4">
        <h1 class="h3 mb-1">Мануалы и регламенты</h1>
        <p class="text-muted mb-0">Краткие инструкции по работе с расписаниями, столами и клиентскими бронированиями.</p>
    </div>

    <div class="accordion" id="manualAccordion">
        <div class="card mb-3">
            <div class="card-header" id="manual-home">
                <h2 class="mb-0">
                    <button class="btn btn-link text-decoration-none" type="button" data-bs-toggle="collapse" data-bs-target="#manual-home-body">
                        Как обновляется главная страница сайта
                    </button>
                </h2>
            </div>
            <div id="manual-home-body" class="collapse show" data-bs-parent="#manualAccordion">
                <div class="card-body">
                    <ol class="mb-0">
                        <li>Главная страница автоматически подхватывает все квесты из справочника. Достаточно создать квест и загрузить превью.</li>
                        <li>Для красивого отображения заполните название, длительность, количество игроков и услуги — они появятся в карточке.</li>
                        <li>Нажмите «Открыть на сайте» на странице «Квесты», чтобы проверить результат.</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header" id="manual-quests">
                <h2 class="mb-0">
                    <button class="btn btn-link text-decoration-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#manual-quests-body">
                        Настройка квестов и бронирование времени
                    </button>
                </h2>
            </div>
            <div id="manual-quests-body" class="collapse" data-bs-parent="#manualAccordion">
                <div class="card-body">
                    <ol>
                        <li>На странице «Квесты» создайте сценарий, затем добавьте временные слоты и базовые цены.</li>
                        <li>В разделе «Бронирования» выбирайте доступный слот — система предложит оформить бронь и сразу закрепить стол.</li>
                        <li>Все новые клиенты заводятся по номеру телефона. Если пользователь уже существует, система обновит его имя.</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header" id="manual-halls">
                <h2 class="mb-0">
                    <button class="btn btn-link text-decoration-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#manual-halls-body">
                        Залы и столы
                    </button>
                </h2>
            </div>
            <div id="manual-halls-body" class="collapse" data-bs-parent="#manualAccordion">
                <div class="card-body">
                    <ol>
                        <li>Создайте зал в разделе «Залы». В описании можно указать расположение или особенности.</li>
                        <li>Перейдите в «Столы», выберите зал, задайте вместимость и дополнительные услуги (например, «торт», «аниматор»).</li>
                        <li>Статус «Активен» определяет, показывается ли стол в расписании. Неактивные столы сохраняют историю, но не участвуют в бронировании.</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header" id="manual-table-schedule">
                <h2 class="mb-0">
                    <button class="btn btn-link text-decoration-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#manual-table-schedule-body">
                        Бронирование столов и привязка к квестам
                    </button>
                </h2>
            </div>
            <div id="manual-table-schedule-body" class="collapse" data-bs-parent="#manualAccordion">
                <div class="card-body">
                    <ol>
                        <li>На странице «Расписание столов» выберите дату и зал. Свободные ячейки подсвечены зелёным статусом «Свободно».</li>
                        <li>Нажмите «Забронировать» напротив нужного времени, заполните данные клиента и укажите ответственного сотрудника.</li>
                        <li>При необходимости активируйте переключатель «Привязать к квесту» — откроется список сценариев, где доступны слоты с тем же временем.</li>
                        <li>Система проверит пересечения и автоматически свяжет бронь стола с бронью квеста.</li>
                    </ol>
                    <p class="mb-0">Брони создаются с шагом 30 минут и доступны с 09:00 до 23:30. Если нужно удержать стол дольше, выберите более позднее время окончания.</p>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="manual-support">
                <h2 class="mb-0">
                    <button class="btn btn-link text-decoration-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#manual-support-body">
                        Частые вопросы
                    </button>
                </h2>
            </div>
            <div id="manual-support-body" class="collapse" data-bs-parent="#manualAccordion">
                <div class="card-body">
                    <ul class="mb-0">
                        <li><strong>Как изменить длительность слота?</strong> — На странице редактирования квеста отредактируйте временной слот и сохраните.</li>
                        <li><strong>Можно ли перенести бронь стола?</strong> — Удалите существующую запись и создайте новую на нужное время. Связанный квест будет освобождён автоматически.</li>
                        <li><strong>Почему стол не появляется в расписании?</strong> — Проверьте, что он привязан к выбранному залу и отмечен как активный.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
