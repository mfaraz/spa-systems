<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Manipulation on reports management
 *
 * @author manmath
 */
class Reports extends HD_Controller {

	public function __construct() {
		parent::__construct();
		$this->_data['title'] = 'Reports Management';
		$this->load->model(array('mreports', 'mcategories'));
		$this->mreports->mis_report();
		$this->load->helper('csv');
		$this->load->library("PHPExcel");
	}

	/**
	 * List all reports by current date
	 */
	public function index() {
		$this->form_validation->set_rules('date', '', 'trim|max_length[10]');
		$this->form_validation->set_rules('type', '', 'trim');
		$this->form_validation->set_rules('cashier', '', 'trim');
		$this->form_validation->set_rules('category', '', 'trim');
		$this->form_validation->set_select('type');
		$this->form_validation->set_select('cashier');
		$this->form_validation->set_select('category');
		$query = $this->mreports->generate_report();
		if ($this->input->post('export')) {
			$phpExcel = new PHPExcel();
			$prestasi = $phpExcel->setActiveSheetIndex(0);
			//merger
			$phpExcel->getActiveSheet()->mergeCells('A1:C1');
			//manage row hight
			$phpExcel->getActiveSheet()->getRowDimension(1)->setRowHeight(25);
			//style alignment
			$styleArray = array(
				'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
				),
			);
			$phpExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
			$phpExcel->getActiveSheet()->getStyle('A1:C1')->applyFromArray($styleArray);
			//border
			$styleArray1 = array(
				'borders' => array(
					'allborders' => array(
						'style' => PHPExcel_Style_Border::BORDER_THIN
					)
				)
			);
			//background
			$styleArray12 = array(
				'fill' => array(
					'type' => PHPExcel_Style_Fill::FILL_SOLID,
					'startcolor' => array(
						'rgb' => 'FFEC8B',
					),
				),
			);
			//freeepane
			$phpExcel->getActiveSheet()->freezePane('A3');
			//coloum width
			$phpExcel->getActiveSheet()->getColumnDimension('A')->setWidth(4.1);
			$phpExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
			$phpExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
			$phpExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
			$phpExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
			$phpExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
			$phpExcel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
			$phpExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
			$phpExcel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
			$phpExcel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
			$phpExcel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
			$phpExcel->getActiveSheet()->getColumnDimension('L')->setWidth(30);
			$prestasi->setCellValue('A1', 'Invoice Report');
			$phpExcel->getActiveSheet()->getStyle('A2:L2')->applyFromArray($styleArray);
			$phpExcel->getActiveSheet()->getStyle('A2:L2')->applyFromArray($styleArray1);
			$phpExcel->getActiveSheet()->getStyle('A2:L2')->applyFromArray($styleArray12);
			$prestasi->setCellValue('A2', 'No');
			$prestasi->setCellValue('B2', 'Invoice Number');
			$prestasi->setCellValue('C2', 'Invoice Date');
			$prestasi->setCellValue('D2', 'Cashier');
			$prestasi->setCellValue('E2', 'Catagory');
			$prestasi->setCellValue('F2', 'Service');
			$prestasi->setCellValue('G2', 'Referrer');
			$prestasi->setCellValue('H2', 'Employee');
			$prestasi->setCellValue('I2', 'Room');
			$prestasi->setCellValue('J2', 'Price');
			$prestasi->setCellValue('K2', 'Discount');
			$prestasi->setCellValue('L2', 'Amount');
			$data = $query;
			if ($data) {
				$no = 0;
				$rowexcel = 2;
				foreach ($data as $row) {
					$no++;
					$rowexcel++;
					$phpExcel->getActiveSheet()->getStyle('A' . $rowexcel . ':L' . $rowexcel)->applyFromArray($styleArray);
					$phpExcel->getActiveSheet()->getStyle('A' . $rowexcel . ':L' . $rowexcel)->applyFromArray($styleArray1);
					$phpExcel->getActiveSheet()->getStyle('B' . $rowexcel)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$prestasi->setCellValue('A' . $rowexcel, $no);
					$prestasi->setCellValue('B' . $rowexcel, $row->invoice_number . ' ');
					$prestasi->setCellValue('C' . $rowexcel, $row->invoice_date);
					$prestasi->setCellValue('D' . $rowexcel, $row->invoice_seller);
					$prestasi->setCellValue('E' . $rowexcel, $row->category_name);
					$prestasi->setCellValue('F' . $rowexcel, $row->service_name);
					$prestasi->setCellValue('G' . $rowexcel, $row->referrer_name);
					$prestasi->setCellValue('H' . $rowexcel, $row->employee);
					$prestasi->setCellValue('I' . $rowexcel, $row->room);
					$prestasi->setCellValue('J' . $rowexcel, '$' . $row->price);
					$prestasi->setCellValue('K' . $rowexcel, $row->discount . '%');
					$prestasi->setCellValue('L' . $rowexcel, '$' . $row->amount);
				}
				$prestasi->setTitle('Invoice Report');
				header("Content-Type: application/vnd.ms-excel");
				header("Content-Disposition: attachment; filename=\"Invoice Report.xls\"");
				header("Cache-Control: max-age=0");
				$objWriter = PHPExcel_IOFactory::createWriter($phpExcel, "Excel5");
				$objWriter->save("php://output");
			}
		}
		$this->form_validation->run();
		$this->_data['reports'] = $query;
		$this->_data['cashiers'] = $this->musers->select_cashier();
		$this->_data['categories'] = $this->mcategories->select(1);
		$this->load->view('index', $this->_data);
	}

	function download_to_excel() {

	}

}

/* End of file reports.php */
/* Location: ./application/controllers/reports.php */
