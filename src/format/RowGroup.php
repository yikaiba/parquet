<?php
namespace jocoon\parquet\format;

/**
 * Autogenerated by Thrift Compiler (0.13.0)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;

class RowGroup
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'columns',
            'isRequired' => true,
            'type' => TType::LST,
            'etype' => TType::STRUCT,
            'elem' => array(
                'type' => TType::STRUCT,
                'class' => '\jocoon\parquet\format\ColumnChunk',
                ),
        ),
        2 => array(
            'var' => 'total_byte_size',
            'isRequired' => true,
            'type' => TType::I64,
        ),
        3 => array(
            'var' => 'num_rows',
            'isRequired' => true,
            'type' => TType::I64,
        ),
        4 => array(
            'var' => 'sorting_columns',
            'isRequired' => false,
            'type' => TType::LST,
            'etype' => TType::STRUCT,
            'elem' => array(
                'type' => TType::STRUCT,
                'class' => '\jocoon\parquet\format\SortingColumn',
                ),
        ),
        5 => array(
            'var' => 'file_offset',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        6 => array(
            'var' => 'total_compressed_size',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        7 => array(
            'var' => 'ordinal',
            'isRequired' => false,
            'type' => TType::I16,
        ),
    );

    /**
     * Metadata for each column chunk in this row group.
     * This list must have the same order as the SchemaElement list in FileMetaData.
     * 
     * 
     * @var \jocoon\parquet\format\ColumnChunk[]
     */
    public $columns = null;
    /**
     * Total byte size of all the uncompressed column data in this row group *
     * 
     * @var int
     */
    public $total_byte_size = null;
    /**
     * Number of rows in this row group *
     * 
     * @var int
     */
    public $num_rows = null;
    /**
     * If set, specifies a sort ordering of the rows in this RowGroup.
     * The sorting columns can be a subset of all the columns.
     * 
     * @var \jocoon\parquet\format\SortingColumn[]
     */
    public $sorting_columns = null;
    /**
     * Byte offset from beginning of file to first page (data or dictionary)
     * in this row group *
     * 
     * @var int
     */
    public $file_offset = null;
    /**
     * Total byte size of all compressed (and potentially encrypted) column data
     * in this row group *
     * 
     * @var int
     */
    public $total_compressed_size = null;
    /**
     * Row group ordinal in the file *
     * 
     * @var int
     */
    public $ordinal = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['columns'])) {
                $this->columns = $vals['columns'];
            }
            if (isset($vals['total_byte_size'])) {
                $this->total_byte_size = $vals['total_byte_size'];
            }
            if (isset($vals['num_rows'])) {
                $this->num_rows = $vals['num_rows'];
            }
            if (isset($vals['sorting_columns'])) {
                $this->sorting_columns = $vals['sorting_columns'];
            }
            if (isset($vals['file_offset'])) {
                $this->file_offset = $vals['file_offset'];
            }
            if (isset($vals['total_compressed_size'])) {
                $this->total_compressed_size = $vals['total_compressed_size'];
            }
            if (isset($vals['ordinal'])) {
                $this->ordinal = $vals['ordinal'];
            }
        }
    }

    public function getName()
    {
        return 'RowGroup';
    }


    public function read($input)
    {
        $xfer = 0;
        $fname = null;
        $ftype = 0;
        $fid = 0;
        $xfer += $input->readStructBegin($fname);
        while (true) {
            $xfer += $input->readFieldBegin($fname, $ftype, $fid);
            if ($ftype == TType::STOP) {
                break;
            }
            switch ($fid) {
                case 1:
                    if ($ftype == TType::LST) {
                        $this->columns = array();
                        $_size35 = 0;
                        $_etype38 = 0;
                        $xfer += $input->readListBegin($_etype38, $_size35);
                        for ($_i39 = 0; $_i39 < $_size35; ++$_i39) {
                            $elem40 = null;
                            $elem40 = new \jocoon\parquet\format\ColumnChunk();
                            $xfer += $elem40->read($input);
                            $this->columns []= $elem40;
                        }
                        $xfer += $input->readListEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->total_byte_size);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 3:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->num_rows);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 4:
                    if ($ftype == TType::LST) {
                        $this->sorting_columns = array();
                        $_size41 = 0;
                        $_etype44 = 0;
                        $xfer += $input->readListBegin($_etype44, $_size41);
                        for ($_i45 = 0; $_i45 < $_size41; ++$_i45) {
                            $elem46 = null;
                            $elem46 = new \jocoon\parquet\format\SortingColumn();
                            $xfer += $elem46->read($input);
                            $this->sorting_columns []= $elem46;
                        }
                        $xfer += $input->readListEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 5:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->file_offset);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 6:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->total_compressed_size);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 7:
                    if ($ftype == TType::I16) {
                        $xfer += $input->readI16($this->ordinal);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                default:
                    $xfer += $input->skip($ftype);
                    break;
            }
            $xfer += $input->readFieldEnd();
        }
        $xfer += $input->readStructEnd();
        return $xfer;
    }

    public function write($output)
    {
        $xfer = 0;
        $xfer += $output->writeStructBegin('RowGroup');
        if ($this->columns !== null) {
            if (!is_array($this->columns)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('columns', TType::LST, 1);
            $output->writeListBegin(TType::STRUCT, count($this->columns));
            foreach ($this->columns as $iter47) {
                $xfer += $iter47->write($output);
            }
            $output->writeListEnd();
            $xfer += $output->writeFieldEnd();
        }
        if ($this->total_byte_size !== null) {
            $xfer += $output->writeFieldBegin('total_byte_size', TType::I64, 2);
            $xfer += $output->writeI64($this->total_byte_size);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->num_rows !== null) {
            $xfer += $output->writeFieldBegin('num_rows', TType::I64, 3);
            $xfer += $output->writeI64($this->num_rows);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->sorting_columns !== null) {
            if (!is_array($this->sorting_columns)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('sorting_columns', TType::LST, 4);
            $output->writeListBegin(TType::STRUCT, count($this->sorting_columns));
            foreach ($this->sorting_columns as $iter48) {
                $xfer += $iter48->write($output);
            }
            $output->writeListEnd();
            $xfer += $output->writeFieldEnd();
        }
        if ($this->file_offset !== null) {
            $xfer += $output->writeFieldBegin('file_offset', TType::I64, 5);
            $xfer += $output->writeI64($this->file_offset);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->total_compressed_size !== null) {
            $xfer += $output->writeFieldBegin('total_compressed_size', TType::I64, 6);
            $xfer += $output->writeI64($this->total_compressed_size);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->ordinal !== null) {
            $xfer += $output->writeFieldBegin('ordinal', TType::I16, 7);
            $xfer += $output->writeI16($this->ordinal);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
