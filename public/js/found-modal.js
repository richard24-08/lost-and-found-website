// found-modal.js - WITHOUT CATCH BLOCK
console.log('🔧 found-modal.js loaded successfully!');

document.getElementById('foundForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    console.log('🚀 === FORM SUBMITTED START ===');
    
    const reportId = document.getElementById('openFoundBtn').getAttribute('data-report-id');
    console.log('📋 Report ID:', reportId);
    
    if (!reportId) {
        alert('Error: Cannot find report ID');
        return;
    }

    // 1. Gunakan FormData dari form asli
    const formData = new FormData(this);
    
    // 2. Process date/time
    const dateFound = formData.get('date_found');
    const timeFound = formData.get('time_found');
    
    if (!dateFound || !timeFound) {
        alert('Please fill both date and time');
        return;
    }
    
    // 3. Update FormData
    formData.delete('date_found');
    formData.delete('time_found');
    formData.append('time_found', `${dateFound} ${timeFound}:00`);
    formData.append('report_type', 'found');
    formData.append('_method', 'PUT');
    
    // 4. Show loading
    const submitBtn = this.querySelector('button[type="submit"]');
    const originalText = submitBtn.textContent;
    submitBtn.textContent = 'Submitting...';
    submitBtn.disabled = true;
    
    console.log('🌐 Making fetch request...');
    
    // 5. Make request - TANPA CATCH BLOCK
    const response = await fetch(`/report/${reportId}`, {
        method: 'POST',
        body: formData
    });
    
    console.log('📨 Response status:', response.status);
    
    // Reset button
    submitBtn.textContent = originalText;
    submitBtn.disabled = false;
    
    if (response.ok) {
        console.log('✅ Success!');
        alert('🎉 Success! The item has been marked as FOUND.');
        closeFoundModal();
        setTimeout(() => {
            window.location.reload();
        }, 1000);
    } else {
        console.error('❌ Server error:', response.status);
        alert('❌ Error: Failed to update item. Status: ' + response.status);
    }
    
    console.log('🏁 === FORM SUBMITTED END ===');
});