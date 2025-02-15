<?php

namespace Database\Seeders;

use App\Models\Request;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $statuses = Status::all();

        foreach ($this->requests() as $request) {
            $user = $users->random();
            $responsible = $users->reject(fn($u) => $u->id === $user->id)->random();

            Request::factory()->create([
                'user_id' => $user->id,
                'status_id' => $statuses->random()->id,
                'responsible_id' => $responsible->id,
            ]);
        }
    }

    private function requests(): array
    {
        return [
            [
                'title' => 'Ошибка авторизации через Google',
                'description' => 'При попытке входа через Google аккаунт происходит перенаправление на страницу 404. Ошибка воспроизводится только на мобильных устройствах.'
            ],
            [
                'title' => 'Добавить поиск по истории заказов',
                'description' => 'Пользователи не могут найти старые заказы по номеру или дате. Необходимо реализовать фильтрацию и поиск в разделе истории заказов.'
            ],
            [
                'title' => 'Не работает кнопка "Сохранить" в профиле',
                'description' => 'После заполнения дополнительных полей в профиле кнопка сохранить не реагирует на клики. В консоли браузера есть ошибки CORS.'
            ],
            [
                'title' => 'Оптимизировать загрузку изображений',
                'description' => 'Страница каталога грузится более 5 секунд из-за больших изображений. Нужно добавить lazy loading и сжатие картинок.'
            ],
            [
                'title' => 'Отсутствует подтверждение email',
                'description' => 'После регистрации пользователь не получает письмо с подтверждением email. Проблема наблюдается только для почтовых ящиков на Outlook.'
            ],
            [
                'title' => 'Добавить 2FA для админ панели',
                'description' => 'Необходимо повысить безопасность админки путем добавления двухфакторной аутентификации через Google Authenticator.'
            ],
            [
                'title' => 'Некорректное отображение цен в EUR',
                'description' => 'При переключении валюты на евро цены отображаются без десятичных знаков (например 25 вместо 25.99).'
            ],
            [
                'title' => 'Увеличить время сессии пользователя',
                'description' => 'Текущая сессия истекает через 15 минут неактивности. Необходимо продлить до 1 часа и добавить remember me функционал.'
            ],
            [
                'title' => 'Ошибка генерации PDF-счета',
                'description' => 'Кириллические символы в PDF-документах отображаются как кракозябры. Проблема возникает только на сервере с Ubuntu.'
            ],
            [
                'title' => 'Реализовать API для мобильного приложения',
                'description' => 'Необходимо разработать RESTful API для методов авторизации, получения профиля и истории заказов с JWT аутентификацией.'
            ]
        ];
    }
}
