<?php
namespace hongkai\parquet;

use hongkai\parquet\data\DataField;
use hongkai\parquet\data\DataColumn;

use hongkai\parquet\file\ThriftFooter;
use hongkai\parquet\file\ThriftStream;
use hongkai\parquet\file\DataColumnReader;

use hongkai\parquet\format\RowGroup;
use hongkai\parquet\format\ColumnChunk;

use hongkai\parquet\helper\ThriftExtensions;

/**
 * [ParquetRowGroupReader description]
 */
class ParquetRowGroupReader {

  /**
   * [$pathToChunk description]
   * @var ColumnChunk[]
   */
  protected $pathToChunk = [];

  /**
   * [$_rowGroup description]
   * @var RowGroup
   */
  protected $_rowGroup;

  /**
   * [protected description]
   * @var ThriftFooter
   */
  protected $footer;

  /**
   * [protected description]
   * @var resource
   */
  protected $stream;

  /**
   * [protected description]
   * @var ThriftStream
   */
  protected $_thriftStream;

  /**
   * [protected description]
   * @var ParquetOptions
   */
  protected $parquetOptions;

  /**
   * [__construct description]
   * @param RowGroup        $rowGroup       [description]
   * @param ThriftFooter    $footer         [description]
   * @param resource        $stream         [description]
   * @param ThriftStream    $thriftStream   [description]
   * @param ParquetOptions  $parquetOptions [description]
   */
  public function __construct(RowGroup $rowGroup, ThriftFooter $footer, $stream, ThriftStream $thriftStream, ParquetOptions $parquetOptions)
  {
    $this->_rowGroup = $rowGroup;
    $this->footer = $footer;
    $this->stream = $stream;
    $this->_thriftStream = $thriftStream;
    $this->parquetOptions = $parquetOptions;

    foreach($this->_rowGroup->columns as $thriftChunk) {
      $path = ThriftExtensions::GetPath($thriftChunk);
      $this->pathToChunk[$path] = $thriftChunk;
    }
  }

  /**
   * [getRowCount description]
   * @return int [description]
   */
  public function getRowCount(): int {
    return $this->_rowGroup->num_rows;
  }


  /**
   * [ReadColumn description]
   * @param  DataField  $field [description]
   * @return DataColumn        [description]
   */
  public function ReadColumn(DataField $field) : DataColumn
  {
    // if ($field == null) throw new ArgumentNullException(nameof(field));

    $columnChunk = $this->pathToChunk[$field->path] ?? null;

    if($columnChunk === null) {
      throw new ParquetException("'{$field->path}' does not exist in this file");
    }

    $columnReader = new DataColumnReader($field, $this->stream, $columnChunk, $this->footer, $this->parquetOptions);

    return $columnReader->read();
  }

}
