<?php

namespace Me\FastExcel;

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Me\FastExcel\Exceptions\FastExcelException;
use Illuminate\Support\Collection;

class FastExcel
{
    protected $data;

    public function __construct($data = null)
    {
        $this->data = $data;
    }

    // Export method
    public function export(string $path, callable $callback = null): void
    {
        $writer = WriterEntityFactory::createXLSXWriter();
        $writer->openToFile($path);

        if ($callback) {
            $this->data->each(fn ($item) => $writer->addRow(WriterEntityFactory::createRowFromArray($callback($item))));
        } else {
            $this->data->each(fn ($item) => $writer->addRow(WriterEntityFactory::createRowFromArray($item)));
        }

        $writer->close();
    }

    // Import method
    public function import(string $path, callable $callback = null): Collection
    {
        $reader = ReaderEntityFactory::createXLSXReader();
        $reader->open($path);

        $collection = collect();

        foreach ($reader->getSheetIterator() as $sheet) {
            foreach ($sheet->getRowIterator() as $row) {
                $data = $row->toArray();
                $collection->push($callback ? $callback($data) : $data);
            }
        }

        $reader->close();

        return $collection;
    }
}
