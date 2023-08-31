<template>
  <div id="app">
    <PageHeader id="header"/>
    <main class="content">

    <div class="comment-image">
      <img src="../public/comment-image.jpeg" alt="Comment Image" />
    </div>

    <comment-form @comment-added="onCommentAdded" />

    <ul>
      <li
        v-for="comment in comments"
        :key="comment.id"
        class="comment-container"
      >
        <div class="comment-header">
          <strong class="user-name">{{ comment.name }}</strong>
          <span class="comment-time">{{ formatTime(comment.time) }}</span>
        </div>
        <div class="comment-text">{{ comment.text }}</div>
        <button class="delete-button" @click="deleteComment(comment)">
          Delete
        </button>
      </li>
    </ul>
    </main>

    <PageFooter id="footer"/>
  </div>
</template>

<script>
import PageHeader from "./components/PageHeader.vue";
import PageFooter from "./components/PageFooter.vue";
import CommentForm from "./components/CommentForm.vue";
import axios from "axios";

export default {
  components: {
    PageHeader,
    PageFooter,
    CommentForm,
  },
  data() {
    return {
      comments: [],
    };
  },
  methods: {
    onCommentAdded(comment) {
      comment.time = new Date();
      this.comments.unshift(comment);
    },
    fetchComments() {
      axios
        .get("/comments_app/api/read")
        .then((response) => {
          this.comments = response.data || [];
        })
        .catch((error) => {
          console.error(error);
        });
    },
    deleteComment(comment) {
      const commentId = comment.id;

      axios
        .delete(`/comments_app/api/delete/${commentId}`)
        .then(() => {
          this.comments = this.comments.filter((c) => c.id !== commentId);
        })
        .catch((error) => {
          console.error(error);
        });
    },
    formatTime(time) {
      return new Date(time).toLocaleString();
    },
  },
  created() {
    this.fetchComments();
  },
};
</script>

<style scoped>
.comment-container {
  border: 1px solid #ddd;
  padding: 10px;
  margin: 10px 0;
  background-color: #f9f9f9;
  display: flex;
  flex-direction: column; /* Change to column */
  gap: 10px; /* Add gap between items */
}

.comment-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.user-name {
  font-weight: bold;
  color: black; 
}

.comment-time {
  font-size: 12px;
  color: #777;
}

.comment-text {
  margin-top: 5px;
}

.delete-button {
  background-color: #f44336;
  color: white;
  border: none;
  padding: 5px 10px;
  cursor: pointer;
}

.delete-button:hover {
  background-color: #d32f2f;
}

.content {
  flex: 1;
  padding: 20px;
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  flex-direction: column;
}

.comment-image {
  margin-top: 75px;
  text-align: center;
}

#app {
  display: flex;
  flex-direction: column;
  min-height: 100vh;
  width: 100%;
  margin: 0;
  padding: 0;
}

#header {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
}

html {
  margin: 0px;
  height: 100%;
  width: 100%;
  padding: 0px;
}
</style>