<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Laravel\Jetstream\Http\Livewire\UpdatePasswordForm;
use Livewire\Livewire;
use Tests\TestCase;

class UpdatePasswordTest extends TestCase
{
    use RefreshDatabase;

    public function test_password_can_be_updated()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        Livewire::test(UpdatePasswordForm::class)
            ->set('state', [
                'current_password' => 'masukan123',
                'password' => 'new-password',
                'password_confirmation' => 'new-password',
            ])
            ->call('updatePassword');

        $user = $user->fresh();

        $this->assertTrue(Hash::check('new-password', $user->password));
    }

    public function test_current_password_must_be_correct()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        Livewire::test(UpdatePasswordForm::class)
            ->set('state', [
                'current_password' => 'wrong-password',
                'password' => 'new-password',
                'password_confirmation' => 'new-password',
            ])
            ->call('updatePassword')
            ->assertHasErrors(['current_password']);

        $user = $user->fresh();

        $this->assertTrue(Hash::check('masukan123', $user->password));
    }

    public function test_new_passwords_must_match()
    {
        $this->actingAs($user = User::factory()->create());

        Livewire::test(UpdatePasswordForm::class)
            ->set('state', [
                'current_password' => 'masukan123',
                'password' => 'new-password',
                'password_confirmation' => 'wrong-password',
            ])
            ->call('updatePassword')
            ->assertHasErrors(['password']);

        $user = $user->fresh();

        $this->assertTrue(Hash::check('masukan123', $user->password));
    }
}
