<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Barangay Resident Information Sheet Editable</title>
  <script src="https://cdn.tailwindcss.com"></script>
  
</head>
<body class="bg-white p-6 min-h-screen flex items-center justify-center">
  <main
    class="max-w-4xl w-full rounded-2xl border border-black p-6 relative"
    id="container"
  >
    <header class="flex justify-between items-center mb-2">
      <!-- Image for the Seal of San Pablo City -->
      <img
        alt="Seal of City of San Pablo, Laguna, Philippines, circular emblem with city symbols and text"
        class="w-20 h-20 object-contain"
        height="80"
        src="spc.jpg"
        width="80"
      />
      <!-- Image for the Seal of Barangay San Gabriel -->
      <img
        alt="Seal of Barangay San Gabriel, circular emblem with barangay symbols and text"
        class="w-20 h-20 object-contain"
        height="80"
        src="brgy2F.jpg"
        width="80"
      />
    </header>
    <div class="text-center mb-4 text-xs leading-tight">
      <p>Republic of the Philippines</p>
      <p>Department of the Interior and Local Government</p>
      <p>San Pablo City, Brgy. San Gabriel</p>
    </div>
    <h2 class="text-center font-semibold italic text-sm mb-6">
      BARANGAY RESIDENT INFORMATION SHEET
    </h2>
    <section class="mb-6 text-xs">
      <h3 class="font-bold text-center mb-2">BARANGAY PROFILE</h3>
          <label class="block mt-3 mb-1 font-bold" for="provinceInput">Province</label>
          <label class="block mt-3 mb-1 font-bold" for="provinceInput">LAGUNA/label>          
        <div class="w-36">
          <label class="block mb-1 font-bold" for="cityInput">City / Municipality</label>
          <label class="block mb-1 font-bold" for="cityInput">SAN PABLO</label>
          <label class="block mt-3 mb-1 font-bold" for="regionInput">Region</label>
          <label class="block mt-3 mb-1 font-bold" for="regionInput">4 - A</label>         

      <h4 class="font-bold mb-1">I. PHYSICAL INFORMATION</h4>
      <label class="block mb-1" for="landAreaInput"
        >Total Land Area (In square hectares) ;</label
      >
      <input
        id="landAreaInput"
        type="text"
        class="w-full border border-black px-1 py-0.5 text-xs mb-2"
        placeholder="Enter land area"
        disabled
      />
      <label class="block font-bold mb-1" for="barangayCategoryInput">
        Barangay Category
        <span class="italic">(Urban, Rural):</span> link to
      </label>
      <input
        id="barangayCategoryInput"
        type="text"
        class="w-full border border-black px-1 py-0.5 text-xs mb-2"
        placeholder="Enter category"
        disabled
      />
      <label class="block font-bold mb-1">Land Classification:</label>
      <div class="mb-2 flex flex-wrap gap-3">
        <label class="inline-flex items-center">
          <input type="checkbox" class="mr-1 land-classification" disabled />
          Upland
        </label>
        <label class="inline-flex items-center">
          <input type="checkbox" class="mr-1 land-classification" disabled />
          Lowland
        </label>
        <label class="inline-flex items-center">
          <input type="checkbox" class="mr-1 land-classification" disabled />
          Coastal
        </label>
        <label class="inline-flex items-center">
          <input type="checkbox" class="mr-1 land-classification" disabled />
          Landlocked
        </label>
      </div>
      <label class="block font-bold mb-1">Barangay Location:</label>
      <div class="mb-2 flex flex-wrap gap-3">
        <label class="inline-flex items-center">
          <input type="checkbox" class="mr-1 barangay-location" disabled />
          Tabing Ilog
        </label>
        <label class="inline-flex items-center">
          <input type="checkbox" class="mr-1 barangay-location" disabled />
          Tabing Dagat
        </label>
        <label class="inline-flex items-center">
          <input type="checkbox" class="mr-1 barangay-location" disabled />
          Tabing- Bundok
        </label>
        <label class="inline-flex items-center">
          <input type="checkbox" class="mr-1 barangay-location" disabled />
          Pablocion
        </label>
      </div>
      <label class="block font-bold mb-1">Major Economic Source:</label>
      <div class="mb-2 flex flex-wrap gap-3">
        <label class="inline-flex items-center">
          <input type="checkbox" class="mr-1 major-economic" disabled />
          Agricultural
        </label>
        <label class="inline-flex items-center">
          <input type="checkbox" class="mr-1 major-economic" disabled />
          Fishing
        </label>
        <label class="inline-flex items-center">
          <input type="checkbox" class="mr-1 major-economic" disabled />
          Commercial
        </label>
        <label class="inline-flex items-center">
          <input type="checkbox" class="mr-1 major-economic" disabled />
          Industrial
        </label>
      </div>
    </section>
    <section class="mb-6 text-xs">
      <h4 class="font-bold mb-1">II.POLITICAL INFORMATION</h4>
      <label class="block mb-1" for="legalBasisInput">Legal Basis of Creation</label>
      <input
        id="legalBasisInput"
        type="text"
        class="w-full border border-black px-1 py-0.5 text-xs mb-2"
        placeholder="Enter legal basis"
        disabled
      />
      <label class="block mb-1" for="precinctsInput">Number of Precincts</label>
      <input
        id="precinctsInput"
        type="number"
        min="0"
        class="w-full border border-black px-1 py-0.5 text-xs mb-2"
        placeholder="Enter number"
        disabled
      />
      <label class="block mb-1" for="nameBarangaySKInput"
        >Name of Barangay and SK Official (2023-2025):
        <span class="italic"
          >link to BPOS automatically(to includeBarangay and SK Secretaries and Treasures and IPMRs)</span
        >
      </label>
      <textarea
        id="nameBarangaySKInput"
        rows="2"
        class="w-full border border-black px-1 py-0.5 text-xs mb-2 resize-none"
        disabled
      ></textarea>
      <label class="block mb-1" for="otherAppointedInput"
        >No. of Other Appointed Barangay Officials and Workers:
        <span class="italic">Link to BPOS automatically</span>
      </label>
      <textarea
        id="otherAppointedInput"
        rows="2"
        class="w-full border border-black px-1 py-0.5 text-xs mb-2 resize-none"
        disabled
      ></textarea>
      <ul class="list-disc list-inside ml-4 text-xs italic space-y-1">
        <li>Lupon Member <sup>■</sup></li>
        <li>Barangay Tanod</li>
        <li>Barangay Health Worker</li>
        <li>Day Care Worker</li>
        <li>VAW Desk Officer</li>
      </ul>
    </section>
    <section class="mb-6 text-xs overflow-x-auto">
      <table
        class="w-full border border-black border-collapse text-center whitespace-nowrap"
      >
        <thead>
          <tr>
            <th
              class="border border-black font-bold text-[9px] px-1 py-0.5 text-left"
              rowspan="2"
            >
              LEVEL OF FUNCTIONALITY OF THE BARANGAY BASED INSTITUIONS (BBIs)
            </th>
            <th
              class="border border-black font-bold text-[9px] px-1 py-0.5"
              rowspan="2"
            >
              BARANGAY - BASED INSTITUTIONS
            </th>
            <th
              class="border border-black font-bold text-[9px] px-1 py-0.5"
              colspan="4"
            >
              LEVELS
            </th>
          </tr>
          <tr>
            <th class="border border-black font-bold text-[9px] px-1 py-0.5">
              IDEAL
            </th>
            <th class="border border-black font-bold text-[9px] px-1 py-0.5">
              HIGHLY FUCTTIONAL
            </th>
            <th class="border border-black font-bold text-[9px] px-1 py-0.5">
              MODARATE
            </th>
            <th class="border border-black font-bold text-[9px] px-1 py-0.5">
              NON - FUNCTIONAL
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td
              class="border border-black text-[9px] px-1 py-0.5 text-left font-semibold"
            >
              BARANGAY - BASED INSTITUTIONS
            </td>
            <td class="border border-black text-[9px] px-1 py-0.5 text-left">
              Barangay Development Council BDC
            </td>
            <td class="border border-black text-[9px] px-1 py-0.5">
              <input
                type="radio"
                name="bdc_level"
                class="mx-auto"
                disabled
                aria-label="BDC Ideal"
              />
            </td>
            <td class="border border-black text-[9px] px-1 py-0.5">
              <input
                type="radio"
                name="bdc_level"
                class="mx-auto"
                disabled
                aria-label="BDC Highly Functional"
              />
            </td>
            <td class="border border-black text-[9px] px-1 py-0.5">
              <input
                type="radio"
                name="bdc_level"
                class="mx-auto"
                disabled
                aria-label="BDC Moderate"
              />
            </td>
            <td class="border border-black text-[9px] px-1 py-0.5">
              <input
                type="radio"
                name="bdc_level"
                class="mx-auto"
                disabled
                aria-label="BDC Non Functional"
              />
            </td>
          </tr>
          <tr>
            <td
              class="border border-black text-[9px] px-1 py-0.5 text-left font-semibold"
            >
            </td>
            <td class="border border-black text-[9px] px-1 py-0.5 text-left">
              Barangay Peace and Order Council (BPOC)
            </td>
            <td class="border border-black text-[9px] px-1 py-0.5">
              <input
                type="radio"
                name="bpoc_level"
                class="mx-auto"
                disabled
                aria-label="BPOC Ideal"
              />
            </td>
            <td class="border border-black text-[9px] px-1 py-0.5">
              <input
                type="radio"
                name="bpoc_level"
                class="mx-auto"
                disabled
                aria-label="BPOC Highly Functional"
              />
            </td>
            <td class="border border-black text-[9px] px-1 py-0.5">
              <input
                type="radio"
                name="bpoc_level"
                class="mx-auto"
                disabled
                aria-label="BPOC Moderate"
              />
            </td>
            <td class="border border-black text-[9px] px-1 py-0.5">
              <input
                type="radio"
                name="bpoc_level"
                class="mx-auto"
                disabled
                aria-label="BPOC Non Functional"
              />
            </td>
          </tr>
          <tr>
            <td
              class="border border-black text-[9px] px-1 py-0.5 text-left font-semibold"
            >
            </td>
            <td class="border border-black text-[9px] px-1 py-0.5 text-left">
              Barangay Council for the Protection of Children and Order Council
              (BCPC)
            </td>
            <td class="border border-black text-[9px] px-1 py-0.5">
              <input
                type="radio"
                name="bcpc_level"
                class="mx-auto"
                disabled
                aria-label="BCPC Ideal"
              />
            </td>
            <td class="border border-black text-[9px] px-1 py-0.5">
              <input
                type="radio"
                name="bcpc_level"
                class="mx-auto"
                disabled
                aria-label="BCPC Highly Functional"
              />
            </td>
            <td class="border border-black text-[9px] px-1 py-0.5">
              <input
                type="radio"
                name="bcpc_level"
                class="mx-auto"
                disabled
                aria-label="BCPC Moderate"
              />
            </td>
            <td class="border border-black text-[9px] px-1 py-0.5">
              <input
                type="radio"
                name="bcpc_level"
                class="mx-auto"
                disabled
                aria-label="BCPC Non Functional"
              />
            </td>
          </tr>
          <tr>
            <td
              class="border border-black text-[9px] px-1 py-0.5 text-left font-semibold"
            >
            </td>
            <td class="border border-black text-[9px] px-1 py-0.5 text-left">
              Violence Against Women (VAW) Desk
            </td>
            <td class="border border-black text-[9px] px-1 py-0.5">
              <input
                type="radio"
                name="vaw_level"
                class="mx-auto"
                disabled
                aria-label="VAW Ideal"
              />
            </td>
            <td class="border border-black text-[9px] px-1 py-0.5">
              <input
                type="radio"
                name="vaw_level"
                class="mx-auto"
                disabled
                aria-label="VAW Highly Functional"
              />
            </td>
            <td class="border border-black text-[9px] px-1 py-0.5">
              <input
                type="radio"
                name="vaw_level"
                class="mx-auto"
                disabled
                aria-label="VAW Moderate"
              />
            </td>
            <td class="border border-black text-[9px] px-1 py-0.5">
              <input
                type="radio"
                name="vaw_level"
                class="mx-auto"
                disabled
                aria-label="VAW Non Functional"
              />
            </td>
          </tr>
        </tbody>
      </table>
    </section>
    <section class="mb-6 text-xs overflow-x-auto">
      <table
        class="w-full border border-black border-collapse text-center whitespace-nowrap"
      >
        <thead>
          <tr>
            <th
              class="border border-black font-bold text-[9px] px-1 py-0.5 text-left"
            >
              BARANGAY - BASED INSTITUTIONS
            </th>
            <th class="border border-black font-bold text-[9px] px-1 py-0.5">
              IDEAL
            </th>
            <th class="border border-black font-bold text-[9px] px-1 py-0.5">
              MATURE
            </th>
            <th class="border border-black font-bold text-[9px] px-1 py-0.5">
              PROGRESSIVE
            </th>
            <th class="border border-black font-bold text-[9px] px-1 py-0.5">
              BASIC
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="border border-black text-[9px] px-1 py-0.5 text-left">
              Barangay Peace and Order Council (BPOC)
            </td>
            <td class="border border-black text-[9px] px-1 py-0.5">
              <input
                type="radio"
                name="bpoc_status"
                class="mx-auto"
                disabled
                aria-label="BPOC Ideal"
              />
            </td>
            <td class="border border-black text-[9px] px-1 py-0.5">
              <input
                type="radio"
                name="bpoc_status"
                class="mx-auto"
                disabled
                aria-label="BPOC Mature"
              />
            </td>
            <td class="border border-black text-[9px] px-1 py-0.5">
              <input
                type="radio"
                name="bpoc_status"
                class="mx-auto"
                disabled
                aria-label="BPOC Progressive"
              />
            </td>
            <td class="border border-black text-[9px] px-1 py-0.5">
              <input
                type="radio"
                name="bpoc_status"
                class="mx-auto"
                disabled
                aria-label="BPOC Basic"
              />
            </td>
          </tr>
          <tr>
            <td class="border border-black text-[9px] px-1 py-0.5 text-left">
              Barangay Council for the Protection of Children and Order Council
              (BCPC)
            </td>
            <td class="border border-black text-[9px] px-1 py-0.5">
              <input
                type="radio"
                name="bcpc_status"
                class="mx-auto"
                disabled
                aria-label="BCPC Ideal"
              />
            </td>
            <td class="border border-black text-[9px] px-1 py-0.5">
              <input
                type="radio"
                name="bcpc_status"
                class="mx-auto"
                disabled
                aria-label="BCPC Mature"
              />
            </td>
            <td class="border border-black text-[9px] px-1 py-0.5">
              <input
                type="radio"
                name="bcpc_status"
                class="mx-auto"
                disabled
                aria-label="BCPC Progressive"
              />
            </td>
            <td class="border border-black text-[9px] px-1 py-0.5">
              <input
                type="radio"
                name="bcpc_status"
                class="mx-auto"
                disabled
                aria-label="BCPC Basic"
              />
            </td>
          </tr>
          <tr>
            <td class="border border-black text-[9px] px-1 py-0.5 text-left">
              Violence Against Women (VAW) Desk
            </td>
            <td class="border border-black text-[9px] px-1 py-0.5">
              <input
                type="radio"
                name="vaw_status"
                class="mx-auto"
                disabled
                aria-label="VAW Ideal"
              />
            </td>
            <td class="border border-black text-[9px] px-1 py-0.5">
              <input
                type="radio"
                name="vaw_status"
                class="mx-auto"
                disabled
                aria-label="VAW Mature"
              />
            </td>
            <td class="border border-black text-[9px] px-1 py-0.5">
              <input
                type="radio"
                name="vaw_status"
                class="mx-auto"
                disabled
                aria-label="VAW Progressive"
              />
            </td>
            <td class="border border-black text-[9px] px-1 py-0.5">
              <input
                type="radio"
                name="vaw_status"
                class="mx-auto"
                disabled
                aria-label="VAW Basic"
              />
            </td>
          </tr>
        </tbody>
      </table>
    </section>
    <div
      class="flex justify-end gap-4 text-xs font-semibold select-none mt-4"
      id="actionButtons"
    >
      <button
        id="editBtn"
        class="underline cursor-pointer text-black hover:text-blue-700"
        type="button"
      >
        Edit
      </button>
      <button
        id="saveBtn"
        class="underline cursor-pointer text-black hover:text-green-700 hidden"
        type="button"
      >
        Save
      </button>
      <button
        id="cancelBtn"
        class="underline cursor-pointer text-black hover:text-red-700 hidden"
        type="button"
      >
        Cancel
      </button>
    </div>
  </main>

  <script >




document.addEventListener('DOMContentLoaded', function() {
  const editBtn = document.getElementById('editBtn');
  const saveBtn = document.getElementById('saveBtn');
  const cancelBtn = document.getElementById('cancelBtn');
  const inputElements = document.querySelectorAll('input:not([type="radio"]), textarea');
  const radioButtons = document.querySelectorAll('input[type="radio"]');
  const barangayDisplay = document.getElementById('barangayDisplay');
  const provinceDisplay = document.getElementById('provinceDisplay');
  const cityDisplay = document.getElementById('cityDisplay');
  const regionDisplay = document.getElementById('regionDisplay');

  let originalValues = {};

  editBtn.addEventListener('click', function() {
    // Store original values before enabling editing
    inputElements.forEach(input => {
      originalValues[input.id] = input.value;
      input.removeAttribute('disabled');
    });
    radioButtons.forEach(radio => {
      radio.removeAttribute('disabled');
    });
    editBtn.classList.add('hidden');
    saveBtn.classList.remove('hidden');
    cancelBtn.classList.remove('hidden');
  });

  cancelBtn.addEventListener('click', function() {
    // Revert to original values
    inputElements.forEach(input => {
      input.value = originalValues[input.id] || '';
      input.setAttribute('disabled', '');
    });
    radioButtons.forEach(radio => {
      radio.setAttribute('disabled', '');
    });
    editBtn.classList.remove('hidden');
    saveBtn.classList.add('hidden');
    cancelBtn.classList.add('hidden');
    originalValues = {}; // Clear stored values
  });

  saveBtn.addEventListener('click', function() {
    // In a real application, you would send the data to a server here.
    // For this example, we'll just disable the fields and hide the buttons.
    alert('Data saved!');
    inputElements.forEach(input => {
      input.setAttribute('disabled', '');
    });
    radioButtons.forEach(radio => {
      radio.setAttribute('disabled', '');
    });
    editBtn.classList.remove('hidden');
    saveBtn.classList.add('hidden');
    cancelBtn.classList.add('hidden');
    originalValues = {}; // Clear stored values
  });

  // Initially set static fields (if needed, though they are in HTML)
  if (barangayDisplay) barangayDisplay.textContent = 'BARANGAY II-F'; // Based on your HTML
  if (provinceDisplay) provinceDisplay.textContent = 'LAGUNA';
  if (cityDisplay) cityDisplay.textContent = 'SAN PABLO';
  if (regionDisplay) regionDisplay.textContent = '4 - A';
});
  </script>
</body>
</html>
