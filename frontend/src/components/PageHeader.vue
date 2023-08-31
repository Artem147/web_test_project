<template>
  <header>
    <h1 class="header-logo">Comments App</h1>
  </header>
</template>

<script>
export default {
  name: 'PageHeader'
};
</script>

<style scoped>
header {
  background-color: #333;
  color: white;
  text-align: left;
  padding: 20px 0;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.header-logo {
  margin: 0;
  padding: 0;
  font-size: 36px;
  text-transform: uppercase;
  letter-spacing: 2px;
  font-style: italic;
  margin-left: 25px;
  font-family: 'EightBits';
}
</style>