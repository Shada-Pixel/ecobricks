<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-2 sm:px-6 py-2 sm:py-4 bg-brick border-none rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-lgreen focus:bg-lgreen active:bg-lgreen focus:outline-none focus:ring-2 focus:ring-brick focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
