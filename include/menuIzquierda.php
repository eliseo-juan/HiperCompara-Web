<div id="menuIzquierda">
	<ul class="menuDesplegable">
		<?php 
			
			$category=$conBBDD->getCategories();
			for($i=0;$i<sizeof($category);$i=$i+1){
				$actual=$category[$i];
				echo "<li>";
				echo "	<a href=\"#\" class=\"itemMenuIzquierda\">".$actual["name"]."</a>";
				echo "	<ul class=\"subMenuIzquierda\">";
				$subcategory=$conBBDD->getSubCategories($actual["id"]);
				for($j=0;$j<sizeof($subcategory);$j=$j+1){
					if($j<sizeof($subcategory)-1)	
						$line="<hr class=\"barramenu\"></li>";
					else
						$line="";
					$subactual=$subcategory[$j];
					$url=$_SERVER['PHP_SELF']."?subcat=".$subactual[id]."&super=".$_SESSION["super_id"];
					echo "<li class='subcat'>"."<a  href='$url'>".$subactual["name"]."</a>";
					echo $line;
				}
				echo "	</ul>";
				echo "</li>";
				
			}
		?>
		<!-- <li>
				<a href="#" class="itemMenuIzquierda">Carnes</a>
				<ul class="subMenuIzquierda">
					<li>Pollo<hr class="barramenu"></li>
					<li>Pavo<hr class="barramenu"></li>
					<li>Cordero<hr class="barramenu"></li>
					<li>Cerdo<hr class="barramenu"></li>
					<li>Ternera</li>
				</ul>
		</li>
		<li>
				<a href="#" class="itemMenuIzquierda">Pescados</a>
					<ul class="subMenuIzquierda">
						<li>Salm&oacute;n<hr class="barramenu"></li>
						<li>Boquer&oacute;n<hr class="barramenu"></li>
						<li>Sardina<hr class="barramenu"></li>
						<li>Sepia<hr class="barramenu"></li>
						<li>Pulpo</li>
					</ul>
		</li>
		<li>
				<a href="#" class="itemMenuIzquierda">Verduras</a>
					<ul class="subMenuIzquierda">
						<li>Espinacas<hr class="barramenu"></li>
						<li>Tomates<hr class="barramenu"></li>
						<li>Lechuga<hr class="barramenu"></li>
						<li>Pimiento<hr class="barramenu"></li>
						<li>Br&oacute;coli</li>
					</ul>
		</li>
		<li>
				<a href="#" class="itemMenuIzquierda">Lacteos</a>
					<ul class="subMenuIzquierda">
						<li>Queso<hr class="barramenu"></li>
						<li>Leche<hr class="barramenu"></li>
						<li>Yogur<hr class="barramenu"></li>
						<li>Flan<hr class="barramenu"></li>
						<li>Cuajada</li>
					</ul>
		</li> -->
	</ul>
</div>