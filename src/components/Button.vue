
<script setup>
import { ref } from 'vue'

defineProps({
    label: {
        type: String,
        default: "Button"
    },
    icon: {
        type: String,
        required: false,
    },
    name: {
        type: String
    }
})

function edit(name, event) {
    switch (name) {
        case "undo": document.execCommand('undo', false, null);
        break;
        case "redo": document.execCommand('redo', false, null);
        break;
        case "heading": document.execCommand('formatBlock', false, 'h1');
        break;
        case "paragraph": document.execCommand('formatBlock', false, 'p');
        break;
        case "image": let url = prompt('Введите адрес изображения', '');
                        if (url) {
                            document.execCommand('insertImage', false, url);
                        }
                        
        break;
        case "html": const editor = document.querySelector('.editor');
        console.dir(editor);
                    const clipboardItem = new ClipboardItem({
                    //     "text/html": new Blob(
                    //     [editor.outerHTML],
                    //     { type: "text/html" }
                    // ),
                        "text/plain": new Blob(
                        [editor.innerHTML],
                        { type: "text/plain" }
                    ),
                        
                });
                    navigator.clipboard.write([clipboardItem]).then(()=>{alert("HTML скопирован в буфер обмена")})
                    // document.execCommand('selectAll', false, null);
                    // document.execCommand('copy', false, null);
        break;
        default: alert("нет такой кнопки")
    }
}
</script>

<template>
  

  <button class="btn" @click="edit(name, $event)">
    <span v-if="icon" :class="['icon', 'icon_' + icon]">
    </span>
    <span v-else class="btn_label">{{ label }}</span>
  </button>

  
</template>

<style scoped>
.btn {
    background-color:#1E1E1E;
    border: 4px rgba(40, 40, 40, 0) solid;
    border-radius: 10px
}
.btn_label {
    color: #639EFF;
    font-family: Roboto;
    font-size: 15px;
    font-style: normal;
    font-weight: 400;
    line-height: 23px;
}
.btn:hover {
    border-color: rgba(99, 158, 255, 1)
}
.icon {
    display: block;
    height: 38px;
    width: 42px;
    
}
.icon_undo {
    background-image: url(../assets/undo.png);
}

.icon_redo {
    background-image: url(../assets/redo.png);
}

.icon_heading {
    background-image: url(../assets/heading.png);
}

.icon_paragraph {
    background-image: url(../assets/paragraph.png);
}

.icon_image {
    background-image: url(../assets/image.png);
}
</style>
