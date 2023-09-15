<script setup>
import Button from './components/Button.vue'
import { onMounted } from 'vue'


</script>

<template>
  <div class="wrapper">
    <div class="container">
    <nav class="menu">
      <Button icon="undo" name="undo"/>
      <Button icon="redo" name="redo"/>
      <Button icon="heading" name="heading" />
      <Button icon="paragraph" name="paragraph" />
      <Button icon="image" name="image"/>
      <Button label="Скопировать HTML" name="html" />
    </nav>
      <div class="editor" contenteditable="true">
      
      </div>
    </div>
  </div>
  
  
</template>

<style scoped>
.menu button {
  margin-right: 4px;
}
</style>
