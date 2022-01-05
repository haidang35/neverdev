
    <div class="settings-panel closed" id="setting-panel">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="global-icons"
            style="display:none">
            <symbol id="icon-check" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M9 21.035l-9-8.638 2.791-2.87 6.156 5.874 12.21-12.436 2.843 2.817z" />
            </symbol>
        </svg>
        <div class="icon" id="setting-panel-toggle">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path
                    d="M8.997 13.985c.01 1.104-.88 2.008-1.986 2.015-1.105.009-2.005-.88-2.011-1.984-.01-1.105.879-2.005 1.982-2.016 1.106-.007 2.009.883 2.015 1.985zm-.978-3.986c-1.104.008-2.008-.88-2.015-1.987-.009-1.103.877-2.004 1.984-2.011 1.102-.01 2.008.877 2.012 1.982.012 1.107-.88 2.006-1.981 2.016zm7.981-4.014c.004 1.102-.881 2.008-1.985 2.015-1.106.01-2.008-.879-2.015-1.983-.011-1.106.878-2.006 1.985-2.015 1.101-.006 2.005.881 2.015 1.983zm-12 15.847c4.587.38 2.944-4.492 7.188-4.537l1.838 1.534c.458 5.537-6.315 6.772-9.026 3.003zm14.065-7.115c1.427-2.239 5.846-9.748 5.846-9.748.353-.623-.429-1.273-.975-.813 0 0-6.572 5.714-8.511 7.525-1.532 1.432-1.539 2.086-2.035 4.447l1.68 1.4c2.227-.915 2.868-1.04 3.995-2.811zm-12.622 4.806c-2.084-1.82-3.42-4.479-3.443-7.447-.044-5.51 4.406-10.03 9.92-10.075 3.838-.021 6.479 1.905 6.496 3.447l1.663-1.456c-1.01-2.223-4.182-4.045-8.176-3.992-6.623.055-11.955 5.466-11.903 12.092.023 2.912 1.083 5.57 2.823 7.635.958.492 2.123.329 2.62-.204zm12.797-1.906c1.059 1.97-1.351 3.37-3.545 3.992-.304.912-.803 1.721-1.374 2.311 5.255-.591 9.061-4.304 6.266-7.889-.459.685-.897 1.197-1.347 1.586z" />
            </svg>
        </div>
        <div class="settings-heading">
            SETTINGS OPTIONS
        </div>
        <div class="settings-wrap">
            <div class="setting-section">
                <div class="setting-section-title">Nav style</div>
                <input type="radio" id="sticky-hide" name="nav_type" value="sticky-hide" checked>
                <label for="sticky-hide">Sticky Hide</label><br>
                <input type="radio" id="sticky" name="nav_type" value="sticky">
                <label for="sticky">Sticky</label><br>
                <input type="radio" id="normal" name="nav_type" value="normal">
                <label for="normal">Normal</label>
            </div>
            <div class="setting-section">
                <div class="setting-section-title">Choose color</div>
                <div class="color-collection" id="color-collection">
                </div>
                <div class="color-output">
                    <div id="selected-color-box" style="--selected-color:#ffffff"></div>
                    <div class="hash">#</div><input type="text" name="accent-color" id="color-code" placeholder="FFFFFF"
                        autocorrect="off" maxlength="6">
                </div>
                <div class="note">
                    <strong>NOTE:</strong> These are accessability tested suggested color. You can copy the color code
                    and use as your accent color.
                </div>
            </div>
        </div>
    </div>
