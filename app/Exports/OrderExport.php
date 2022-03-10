<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\FromCollection;

class OrderExport implements FromArray, WithHeadings, WithStyles, WithEvents, ShouldAutoSize, WithColumnWidths
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public $iterm;

    public function __construct($arrTile, $arrTileContent, $arrayDetail)
    {
        $this->arrTile = $arrTile;
        $this->arrayDetail = $arrayDetail;
        $this->arrTileContent = $arrTileContent;
    }

    public function array(): array
    {
        return $this->arrayDetail;
    }

    public function headings(): array
    {
        return [ $this->arrTile, $this->arrTileContent ];
    }

    public function styles(worksheet $sheet)
    {
        $sheet->mergeCells('A1:J1');
        $iterm = $this->iterm;


            $sheet->getStyle('A1:J1')->getAlignment()->applyFromArray( array('horizontal' => 'center', 'vertical' => 'center'));

            $sheet->getRowDimension(1)->setRowHeight(50);
            $sheet->getRowDimension(2)->setRowHeight(40);

            $sheet->getStyle('A2:J1000')->getAlignment()->applyFromArray( array('horizontal' => 'center', 'vertical' => 'center'))->setWrapText(true);

    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $cellRange = 'A1:J1';
                $event->sheet->getDelegate()
                    ->getStyle($cellRange)
                    ->getFont()
                    ->setBold(true)
                    ->setSize(15)
                    ->getColor()
                    ->setRGB('FF0000');

                $cellRange1 = 'A2:J2';
                $event->sheet->getDelegate()
                    ->getStyle($cellRange1)
                    ->getFont()
                    ->setBold(true)
                    ->setSize(13)
                    ->getColor()
                    ->setRGB('000000');

                $event->sheet->getStyle('A2:J2')->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('FFCC00');
            }
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A'  => 8,
            'B'  => 20,
            'C'  => 25,
            'D'  => 30,
            'E'  => 25,
            'F'  => 40,
            'G'  => 25,
            'H'  => 25,
            'I'  => 25,
            'J'  => 25,
        ];
    }
}
