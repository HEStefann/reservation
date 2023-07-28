const permanentSettingsBtn = document.getElementById('permanentSettingsBtn');
const temporarySettingsBtn = document.getElementById('temporarySettingsBtn');
const permanentSettingsContainer = document.getElementById('permanentSettingsContainer');
const temporarySettingsContainer = document.getElementById('temporarySettingsContainer');

permanentSettingsBtn.addEventListener('click', () => {
    permanentSettingsContainer.classList.remove('hidden');
    temporarySettingsContainer.classList.add('hidden');
});

temporarySettingsBtn.addEventListener('click', () => {
    permanentSettingsContainer.classList.add('hidden');
    temporarySettingsContainer.classList.remove('hidden');
});