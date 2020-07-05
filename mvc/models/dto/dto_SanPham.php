<?php
    class dto_SanPham{
        private $ma_sp;
        private $ma_cpu;
        private $ma_ram;
        private $ma_hang;
        private $ten_sp;
        private $gia;
        private $trang_thai;
        private $src_img;
        private $mo_ta;
        private $model_cpu;
        private $model_ram;
        private $model_hang;
        
        public function __construct()
        {
            
        }
        
        public function getMa_sp()
        {
                return $this->ma_sp;
        }

        public function getMa_cpu()
        {
                return $this->ma_cpu;
        }


        public function getMa_ram()
        {
                return $this->ma_ram;
        }

        public function getMa_hang()
        {
                return $this->ma_hang;
        }

        public function getTen_sp()
        {
                return $this->ten_sp;
        }

        public function getGia()
        {
                return $this->gia;
        }

        public function getTrang_thai()
        {
                return $this->trang_thai;
        }

        /**
         * Get the value of src_img
         */ 
        public function getSrc_img()
        {
                return $this->src_img;
        }

        /**
         * Get the value of mo_ta
         */ 
        public function getMo_ta()
        {
                return $this->mo_ta;
        }

        /**
         * Get the value of model_cpu
         */ 
        public function getModel_cpu()
        {
                return $this->model_cpu;
        }

        /**
         * Get the value of model_ram
         */ 
        public function getModel_ram()
        {
                return $this->model_ram;
        }

        /**
         * Get the value of model_hang
         */ 
        public function getModel_hang()
        {
                return $this->model_hang;
        }

        /**
         * Set the value of ma_sp
         *
         * @return  self
         */ 
        public function setMa_sp($ma_sp)
        {
                $this->ma_sp = $ma_sp;

                return $this;
        }

        /**
         * Set the value of ma_cpu
         *
         * @return  self
         */ 
        public function setMa_cpu($ma_cpu)
        {
                $this->ma_cpu = $ma_cpu;

                return $this;
        }

        /**
         * Set the value of ma_ram
         *
         * @return  self
         */ 
        public function setMa_ram($ma_ram)
        {
                $this->ma_ram = $ma_ram;

                return $this;
        }

        /**
         * Set the value of ma_hang
         *
         * @return  self
         */ 
        public function setMa_hang($ma_hang)
        {
                $this->ma_hang = $ma_hang;

                return $this;
        }
        
        

        /**
         * Set the value of ten_sp
         *
         * @return  self
         */ 
        public function setTen_sp($ten_sp)
        {
                $this->ten_sp = $ten_sp;

                return $this;
        }

        /**
         * Set the value of gia
         *
         * @return  self
         */ 
        public function setGia($gia)
        {
                $this->gia = $gia;

                return $this;
        }

        /**
         * Set the value of trang_thai
         *
         * @return  self
         */ 
        public function setTrang_thai($trang_thai)
        {
                $this->trang_thai = $trang_thai;

                return $this;
        }

        /**
         * Set the value of src_img
         *
         * @return  self
         */ 
        public function setSrc_img($src_img)
        {
                $this->src_img = $src_img;

                return $this;
        }

        /**
         * Set the value of mo_ta
         *
         * @return  self
         */ 
        public function setMo_ta($mo_ta)
        {
                $this->mo_ta = $mo_ta;

                return $this;
        }

        /**
         * Set the value of model_cpu
         *
         * @return  self
         */ 
        public function setModel_cpu($model_cpu)
        {
                $this->model_cpu = $model_cpu;

                return $this;
        }

        /**
         * Set the value of model_ram
         *
         * @return  self
         */ 
        public function setModel_ram($model_ram)
        {
                $this->model_ram = $model_ram;

                return $this;
        }

        /**
         * Set the value of model_hang
         *
         * @return  self
         */ 
        public function setModel_hang($model_hang)
        {
                $this->model_hang = $model_hang;

                return $this;
        }
    }
?>