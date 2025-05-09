
function printModal(modalId) {
    const modalContent = document.querySelector(`#${modalId} .modal-content`).cloneNode(true);

    const printWindow = window.open('', '_blank');
    printWindow.document.open();
    printWindow.document.write(`
        <html>
            <head>
                <title>Imprimir Detalles</title>
                <link rel="stylesheet" href="path/to/bootstrap.min.css">
                <style>
                    body { padding: 20px; font-family: Arial, sans-serif; }
                    .modal-header .close { display: none; }
                    .modal-footer button { display: none; }
                </style>
            </head>
            <body>
                ${modalContent.innerHTML}
            </body>
        </html>
    `);
    printWindow.document.close();
    printWindow.onload = function() {
        printWindow.print();
        printWindow.close();
    };
}