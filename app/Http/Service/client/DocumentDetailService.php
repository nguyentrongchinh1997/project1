<?php

namespace App\Http\Service\client;

use App\Model\Document;
use Spatie\PdfToImage\Pdf;

class DocumentDetailService
{
    protected $documentModel;

    public function __construct(Document $document)
    {
        $this->documentModel = $document;
    }

    /**
     * - Lấy tài liệu ứng với id
     * - Nếu tài liệu đó trả phí và chưa convert số trang preview sang ảnh thì thực hiện vonvert rồi update convert_status = 1
     */
    public function viewDocumentDetail($documentId)
    {
        $detailDocument = $this->documentModel->findOrFail($documentId);

        if ($detailDocument->type == config('config.document.type.pay') && $detailDocument->convert_status == config('config.document.convert.no')) {
            $pdf = new Pdf(public_path() . config('config.document.url.file') . $detailDocument->url_document . '.pdf');
            for ($i = 1; $i <= $detailDocument->preview; $i++) {
                $name = $detailDocument->unsigned_name . '-' . $documentId . '-' . $i;

                if (!file_exists(public_path() . config('config.document.url.preview') . $name)) {
                    $pdf->setPage($i)->saveImage(public_path() . config('config.document.url.preview') . $name);
                } 
            }
            $this->documentModel->where('id', $documentId)->update(['convert_status' => config('config.document.convert.yes')]);
        }
        $data = [
            'detailDocument' => $detailDocument,
        ];

        return $data;
    }
}
