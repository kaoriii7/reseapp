<button {{ $attributes->merge(['type' => 'submit']) }}>
    {{ $slot }}
</button>

<style>
  button {
    margin: 0 30px 30px 30px;
    padding: 10px 20px;
    font-size: 16px;
    font-weight: bold;
    color: white;
    background: #1463ff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    box-shadow: 3px 3px 5px rgba(0, 0, 0, .5);
  }
</style>
