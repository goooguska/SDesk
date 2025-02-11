<template>
    <div class="bg-gray-100 mx-auto flex min-h-screen w-full flex-col">
        <header class="my-12 bg-white" v-if="$slots.header">
            <slot name="header" />
        </header>

        <main class="flex flex-grow justify-center">
            <div class="mx-auto w-10/12 px-4">
                <slot name="main" />
            </div>
        </main>

        <footer class="my-12 flex justify-center bg-white" v-if="$slots.footer">
            <slot name="footer" />
        </footer>
    </div>
</template>
