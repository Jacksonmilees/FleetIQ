<?php declare(strict_types=1);

namespace App\Domains\User\Seeder;

use Illuminate\Support\Facades\Hash;
use App\Domains\Core\Seeder\SeederAbstract;
use App\Domains\Language\Model\Language as LanguageModel;
use App\Domains\Timezone\Model\Timezone as TimezoneModel;
use App\Domains\User\Model\User as Model;

class User extends SeederAbstract
{
    /**
     * @return void
     */
    public function run(): void
    {
        Model::query()->updateOrCreate([
            'email' => 'jacksonmilees@gmail.com',
        ], [
            'name' => 'Super Admin',
            'password' => Hash::make('3r14Fg65mV"'),
            'preferences' => $this->preferences(),
            'telegram' => ['username' => 'Telegram'],
            'admin' => true,
            'admin_mode' => true,
            'manager' => true,
            'manager_mode' => true,
            'enabled' => true,
            'api_key' => null,
            'api_key_prefix' => null,
            'api_key_enabled' => false,
            'language_id' => $this->languageId(),
            'timezone_id' => $this->timezoneId(),
        ]);
    }

    /**
     * @return array<string, array<string, string>>
     */
    protected function preferences(): array
    {
        return [
            'units' => [
                'money' => 'euro',
                'volume' => 'liter',
                'decimal' => ',',
                'distance' => 'kilometer',
                'thousand' => '.',
            ],
        ];
    }

    /**
     * @return int
     */
    protected function languageId(): int
    {
        return (int) LanguageModel::query()->whereDefault()->value('id');
    }

    /**
     * @return int
     */
    protected function timezoneId(): int
    {
        return (int) TimezoneModel::query()->whereDefault()->value('id');
    }
}