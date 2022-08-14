<x-guest-layout>
  <div class="card">
    <h2>Login</h2>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="form">
          <i class="fa-solid fa-envelope fa-xl"></i>
          <x-input id="email" class="email" type="email" name="email"  placeholder="Email" :value="old('email')" required autofocus />
        </div>

        <!-- Password -->
        <div class="form">
          <i class="fa-solid fa-lock fa-xl"></i>
          <x-input id="password" class="password" type="password" name="password" placeholder="Password" required autocomplete="current-password" />
        </div>

        <div class="btn">
            <x-button>
                {{ __('ログイン') }}
            </x-button>
        </div>
    </form>
  </div>
</x-guest-layout>

<style>
  .card {
    width: 45%;
    background: white;
    margin: 100px auto;
    border-radius: 5px;
  }
  h2 {
    color: white;
    font-size: 24px;
    background: #1463ff;
    padding: 30px 20px;
    border-top-right-radius: 5px;
    border-top-left-radius: 5px;
  }
  .form {
    text-align: center;
    margin: 25px 0;
  }
  .fa-solid {
    margin-right: 10px;
    color: #696969;
  }
  input {
    width: 80%;
    border: none;
    border-bottom: 1px solid black;
    font-size: 16px;
  }
  .btn {
    text-align: right;
  }
</style>
