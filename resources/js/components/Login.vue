<template>
  <div>
    <h2>Вход</h2>
    <form @submit.prevent="login">
      <input type="email" v-model="email" placeholder="Email" required>
      <input type="password" v-model="password" placeholder="Пароль" required>
      <button type="submit">Войти</button>
    </form>
    <p v-if="message">{{ message }}</p>
  </div>
</template>

<script>
export default {
  data() {
    return {
      email: '',
      password: '',
      message: ''
    };
  },
  methods: {
    async login() {
      try {
        const response = await fetch('/login', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({ email: this.email, password: this.password })
        });
        const data = await response.json();
        this.message = data.message || 'Ошибка входа';

        if (data.token) {
          localStorage.setItem('token', data.token); // Сохраняем токен
          this.$router.push('/profile'); // Перенаправляем на профиль
        }
      } catch (error) {
        console.error('Ошибка:', error);
      }
    }
  }
}
</script>
