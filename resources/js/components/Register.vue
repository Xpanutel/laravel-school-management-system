<template>
  <div>
    <h2>Регистрация</h2>
    <form @submit.prevent="register">
      <input type="text" v-model="name" placeholder="Имя" required>
      <input type="email" v-model="email" placeholder="Email" required>
      <input type="password" v-model="password" placeholder="Пароль" required>
      <select v-model="role" required>
        <option value="">Выберите роль</option>
        <option value="teacher">Учитель</option>
        <option value="student">Ученик</option>
      </select>
      <button type="submit">Регистрация</button>
    </form>
    <p v-if="message">{{ message }}</p>
  </div>
</template>

<script>
export default {
  data() {
    return {
      name: '',
      email: '',
      password: '',
      role: '',
      message: ''
    };
  },
  methods: {
    async register() {
      try {
        const response = await fetch('/register', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({ name: this.name, email: this.email, password: this.password, role: this.role })
        });
        const data = await response.json();
        this.message = data.message || 'Ошибка регистрации';
      } catch (error) {
        console.error('Ошибка:', error);
      }
    }
  }
}
</script>
