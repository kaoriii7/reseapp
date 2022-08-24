<x-guest-layout>
  <div class="card">
    <h2>Registration</h2>
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('register') }}">
      @csrf

      <!-- Name -->
      <div class="form">
          <i class="fa-solid fa-user fa-xl"></i>
          <x-input id="name" type="text" name="name" :value="old('name')" placeholder="Username" required autofocus />
      </div>

      <!-- Email Address -->
      <div class="form">
          <i class="fa-solid fa-envelope fa-xl"></i>
          <x-input id="email" type="email" name="email" :value="old('email')" placeholder="Email" required />
      </div>

      <!-- Password -->
      <div class="form">
          <i class="fa-solid fa-lock fa-xl"></i>
          <x-input id="password" type="password" name="password" placeholder="Password" required autocomplete="new-password" />
      </div>

      <!-- Confirm Password -->
      <div class="form">
          <i class="hidden-icon fa-solid fa-lock fa-xl"></i>
          <x-input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm Password" required />
      </div>

      <div class="btn">
        <x-button>
          {{ __('登録') }}
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
    box-shadow: 3px 3px 5px rgba(0, 0, 0, .5);
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
  .hidden-icon {
    color: white;
  }
</style>
