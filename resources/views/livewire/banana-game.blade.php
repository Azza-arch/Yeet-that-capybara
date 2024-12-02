<div wire:poll.500ms="gravity"
    class="relative w-full h-[500px] bg-gradient-to-b from-yellow-100 to-yellow-50 flex flex-col items-center justify-center overflow-hidden">
    <!-- Falling Object (Banana/Capybara) -->
    <div id="game-container" class="absolute bottom-2 z-50">
        <button wire:click="yeetBanana" id="banana"
            class="transition-all duration-500 ease-linear shadow-lg rounded-full bg-white text-xl p-2"
            style="transform: translate({{ $x }}px, -{{ $y }}px) {{ $isFalling ? 'rotate(180deg)' : '' }}; 
                   transition: transform 0.5s cubic-bezier(0.4, 0.0, 0.2, 1);"
            @if ($gameOver) disabled @endif>
            {{ $isFalling ? '🦫' : '🍌' }}
        </button>
    </div>

    <!-- Score Display -->
    <div class="absolute top-8 z-50 flex flex-col items-center space-y-2">
        <div class="transform text-[32px] font-extrabold text-yellow-700 tracking-widest drop-shadow-md">
            SCORE: <span class="text-yellow-600">{{ $score }}</span>
        </div>
        <!-- Reset Button -->
        <button wire:click="resetGame"
            class="px-8 py-3 bg-yellow-500 text-white font-bold rounded-full hover:bg-yellow-600 transition duration-300 shadow-md focus:outline-none text-lg">
            RESET GAME
        </button>
    </div>

    <!-- Game Over Message -->
    @if ($gameOver)
        <div
            class="absolute bottom-24 left-1/2 transform -translate-x-1/2 text-[36px] font-bold text-red-600 tracking-widest animate-pulse drop-shadow-lg">
            GAME OVER!
        </div>
    @endif
</div>
