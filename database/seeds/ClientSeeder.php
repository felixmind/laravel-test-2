<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClientSeeder extends Seeder
{
    private $names = [
        'Иван Иванов',
        'Георгий Кротов',
        'Владислав Пельш',
        'Наталья Абрамова',
        'Ольга Юрьева',
        'Максим Попов',
        'Дмитрий Георгиев',
        'Анатолий Вассерман',
        'Антон Калинин',
        'Кирилл Хрипко',
        'Ян Балдин',
        'Евгений Зайцев',
        'Петр Петров',
        'Вячеслав Юрьев',
    ];

    private $nowDateTime;

    public function __construct()
    {
        $this->nowDateTime = Carbon::now()->toDateTimeString();
    }

    public function run(): void
    {
        foreach ($this->names as $name) {
            [$firstName, $lastName] = explode(' ', $name);
            $clientId = $this->seedClient($firstName, $lastName);

            $this->seedRandomPhonesForClient($clientId);
            $this->seedRandomEmailsForClient($clientId);
        }
    }

    /**
     * Добавляет запись о клиенте и возвращает идентификатор записи.
     *
     * @param string $firstName
     * @param string $lastName
     *
     * @return int
     */
    private function seedClient(string $firstName, string $lastName): int
    {
        return DB::table('clients')->insertGetId([
            'first_name' => $firstName,
            'last_name'  => $lastName,
            'created_at' => $this->nowDateTime,
            'updated_at' => $this->nowDateTime,
        ]);
    }

    /**
     * Генерирует от 0 до 3 случайных номера телефона и привязывает к указанному клиенту.
     *
     * @param int $clientId
     *
     * @throws Exception
     */
    private function seedRandomPhonesForClient(int $clientId): void
    {
        $phonesCount = random_int(1, 3);
        while($phonesCount-- > 0) {
            DB::table('client_phones')->insertOrIgnore([
                'client_id'  => $clientId,
                'phone'      => random_int(70000000000, 89999999999),
                'created_at' => $this->nowDateTime,
                'updated_at' => $this->nowDateTime,
            ]);
        }
    }

    /**
     * Генерирует от 0 до 3 случайных адреса электронной почты и привязывает к указанному клиенту.
     *
     * @param int $clientId
     *
     * @throws Exception
     */
    private function seedRandomEmailsForClient(int $clientId): void
    {
        $emailsCount = random_int(1, 3);
        while($emailsCount-- > 0) {
            DB::table('client_emails')->insertOrIgnore([
                'client_id'  => $clientId,
                'email'      => Str::random(10) . '@gmail.com',
                'created_at' => $this->nowDateTime,
                'updated_at' => $this->nowDateTime,
            ]);
        }
    }
}
