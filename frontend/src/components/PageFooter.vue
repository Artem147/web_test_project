<template>
  <footer>
    <div class="contacts">
      <div class="contact-column">
        <p>Contact me:</p>
        <ul class="social-links">
          <li><a href="https://www.facebook.com/">Facebook</a></li>
          <li><a href="https://twitter.com/">Twitter</a></li>
          <li><a href="https://www.instagram.com/">Instagram</a></li>
        </ul>
      </div>
      <div class="contact-column">
        <p>Messengers:</p>
        <ul class="messenger-links">
          <li>Email: shirkunovartem@gmail.com</li>
          <li>Telegram: @shirkunov</li>
        </ul>
      </div>
    </div>
    <div>Made by Shirkunov Artem</div>
  </footer>
</template>

<style scoped>

footer {
  background: #303036;
  color: #d3d3d3;
  padding: 20px 0;
  text-align: center;
  bottom: 0;
  left: 0;
  right: 0;
}

.contacts {
  display: flex;
  justify-content: flex-start;
  font-size: 18px;
  color: #555;
  margin: 20px;
}

.contact-column {
  display: flex;
  flex-direction: column;
  margin-right: 20px;
}

.social-links,
.messenger-links {
  list-style: none;
  padding: 0;
  margin: 0;
}

.social-links li,
.messenger-links li {
  margin: 5px 0;
}

.social-links a,
.messenger-links li {
  color: #007bff;
  text-decoration: none;
}

.social-links a:hover,
.messenger-links li {
  text-decoration: underline;
}
</style>