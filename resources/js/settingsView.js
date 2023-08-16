const permanentSettingsBtn = document.getElementById('permanentSettingsBtn');
const temporarySettingsBtn = document.getElementById('temporarySettingsBtn');
const permanentSettingsContainer = document.getElementById('permanentSettingsContainer');
const temporarySettingsContainer = document.getElementById('temporarySettingsContainer');

permanentSettingsBtn.addEventListener('click', () => {
    console.log('Permanent Settings button clicked');
    permanentSettingsContainer.classList.remove('hidden');
    temporarySettingsContainer.classList.add('hidden');
});

temporarySettingsBtn.addEventListener('click', () => {
    console.log('Temporary Settings button clicked');
    permanentSettingsContainer.classList.add('hidden');
    temporarySettingsContainer.classList.remove('hidden');
});