<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use LdapRecord\Models\ActiveDirectory\User as LdapUser;

class SyncLdapUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'app:sync-ldap-users';
    protected $signature = 'ldap:sync-users';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync users from AD into DB';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // $ldapUsers = LdapUser::get();

        // foreach($ldapUsers as $ldapUser){
        //     $attributes = [
        //         'name' => $ldapUser->getFirstAttribute('cn'),
        //         'email' => $ldapUser->getFirstAttribute('mail'),
        //         'username' => $ldapUser->getFirstAttribute('samaccountname')
        //     ];

        //     User::updateOrCreate(
        //         ['username' => $attributes['username']],
        //         $attributes
        //     );

        //     $this->info("User Synced: {$attributes['username']}");
        // }
        // $this->info('user syncd');

        $ldapUser = LdapUser::find('samaccountname=1449');

        if($ldapUser){
            $attributes = $ldapUser->getAttributes();
            return array_keys($attributes);
        }

        return 'User not found';
    }
}
