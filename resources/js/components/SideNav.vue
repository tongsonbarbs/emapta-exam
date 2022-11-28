<template>
  <div id="side-nav" class="h-100 py-5">
    <ul class="navbar-nav text-light">
      <li class="nav-item">
        <router-link :to="{ path: '/dashboard/' }" class="nav-link"
          >Dashboard</router-link
        >
      </li>
    </ul>
  </div>
</template>
<style scoped>
#side-nav {
  background: rgb(2, 0, 36);
  background: linear-gradient(
    200deg,
    rgba(2, 0, 36, 1) 10%,
    rgba(9, 9, 121, 1) 74%,
    rgb(0 102 255) 121%
  );
}
li a {
  padding: 1em;
}
a:hover {
  background: #293450;
}
.router-link-active,
.router-link-active:hover {
  background: #0537bb;
}
</style>