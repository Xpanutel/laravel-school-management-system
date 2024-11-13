<template>
  <div>
    <h2>Профиль</h2>
    <p v-if="user">Добро пожаловать, {{ user.fullname }}!</p>
    <button @click="fetchProfile">Получить профиль</button>
    <div v-if="profileInfo">{{ profileInfo }}</div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      user: {},
      profileInfo: ''
    };
  },
  methods: {
    async fetchProfile() {
      const token = localStorage.getItem('token');
      if (!token) {
        this.profileInfo = 'Сначала выполните вход.';
        return;
      }

      try {
        const response = await fetch('/profile', {
          method: 'GET',
          headers: {
            'Authorization': `Bearer ${token}`
          }
        });
        const data = await response.json();
        this.profileInfo = JSON.stringify(data);
      } catch (error) {
        console.error('Ошибка:', error);
      }
    }
  }
}
</script>
