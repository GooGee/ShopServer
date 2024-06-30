<?php
declare(strict_types=1);

namespace App\Console\Commands;

use App\Api\Address\CreateOne\CreateOneAddress;
use App\Api\User\CreateOne\CreateOneUser;
use App\Models\User;
use App\Repository\UserRepository;
use App\Service\AmountPerHour;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CreateUser {amount=1} {--s}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create User';

    const Mailzz = [
        'gmail.com',
        'live.com',
        'hotmail.com',
        'outlook.com',
        'aim.com',
        'aol.com',
        'yahoo.com',
        'pm.com',
        'protonmail.com',
        'zoho.com',
        'yandex.com',
        'gmx.com',
        'hubspot.com',
        'mail.com'
    ];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    private array $LastNamezz = [];

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(CreateOneUser $createOneUser, CreateOneAddress $createOneAddress, UserRepository $repository)
    {
        if ($this->option('s')) {
            $total = $repository->query()->count();
            if (AmountPerHour::after($total) === false) {
                $this->info('skip');
                return 0;
            }
        }

        $amount = intval($this->argument('amount'));
        if ($amount === 0) {
            $amount = 1;
        }

        $this->info('create user');
        $namezz = $this->makeNamezz($amount);
        /** @var User[] $userzz */
        $userzz = [];
        foreach ($namezz as $name) {
            if (rand(0, 2)) {
                $name = $name . rand(1966, 2033);
            }
            $userzz[] = $createOneUser($name, $name . '@' . Arr::random(self::Mailzz), strval(rand(111222, 1222333)));
        }
        $this->info('create address');
        $this->createAddress($userzz, $createOneAddress, $this->LastNamezz);
        $this->info('OK');
        return 0;
    }

    /**
     * @param User[] $userzz
     * @param CreateOneAddress $createOneAddress
     * @param string[] $lnzz
     * @return void
     * @throws \League\Flysystem\FilesystemException
     */
    function createAddress(array $userzz, CreateOneAddress $createOneAddress, array $lnzz)
    {
        $text = Storage::disk('root')->read('resources/address.json');
        $data = json_decode($text, true);
        $cszz = $data['CityStatezz'];
        $sszz = $data['StreetSuffixzz'];

        foreach ($userzz as $item) {
            $phone = rand(111, 999) . '-' . rand(111, 999) . '-' . rand(1222, 9888);
            $city = Arr::random($cszz);
            $address = rand(11, 333) . ' ' . Arr::random($lnzz) . ' ' . Arr::random($sszz) . ', ' . $city['name'] . ', ' . $city['state'];
//            $this->info($address);
            $createOneAddress($item, 238, rand(111222, 999888), $item->name, $phone, $address);
        }
    }

    function makeNamezz(int $amount)
    {
        $text = Storage::disk('root')->read('resources/name.json');
        $data = json_decode($text, true);
        $femalezz = $data['FirstNameFemalezz'];
        $malezz = $data['FirstNameMalezz'];
        $lnzz = $data['LastNamezz'];
        $this->LastNamezz = $lnzz;

        if ($amount === 1) {
            $fnzz = $femalezz;
            if (rand(0, 1)) {
                $fnzz = $malezz;
            }
            return [Arr::random($fnzz) . Arr::random($lnzz)];
        }

        $zz = Arr::random($lnzz, $amount);
        $namezz = [];
        foreach ($zz as $key => $item) {
            $fnzz = $femalezz;
            if ($key & 1) {
                $fnzz = $malezz;
            }
            $namezz[$key] = Arr::random($fnzz) . $item;
        }
        return $namezz;
    }

}
