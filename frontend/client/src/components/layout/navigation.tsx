import { useState } from "react";
import { Link, useLocation } from "wouter";
import { motion, AnimatePresence } from "framer-motion";
import { Heart, Menu, X, Shield } from "lucide-react";
import { Button } from "@/components/ui/button";

export default function Navigation() {
  const [location] = useLocation();
  const [mobileMenuOpen, setMobileMenuOpen] = useState(false);

  const navItems = [
    { path: "/", label: "Home" },
    { path: "/animals", label: "Animals" },
    { path: "/stories", label: "Stories" },
    { path: "/process", label: "Process" },
    { path: "/medical-services", label: "Medical Services" },
  ];

  return (
    <nav className="bg-white shadow-lg fixed top-0 w-full z-50">
      <div className="max-w-7xl mx-auto px-4">
        <div className="flex justify-between items-center py-4">
          <Link href="/">
            <div className="flex items-center space-x-3 cursor-pointer">
              <Heart className="text-primary text-2xl fill-current" />
              <span className="text-xl font-bold text-gray-800">
                Rescue The Voiceless
              </span>
            </div>
          </Link>

          {/* Desktop Menu */}
          <div className="hidden md:flex items-center space-x-8">
            {navItems.map((item) => (
              <Link key={item.path} href={item.path}>
                <span
                  className={`font-medium transition-colors cursor-pointer ${
                    location === item.path
                      ? "text-primary"
                      : "text-gray-700 hover:text-primary"
                  }`}
                >
                  {item.label}
                </span>
              </Link>
            ))}
            
            {/* Superadmin Login Link */}
            <Link href="/superadmin/login">
              <Button variant="outline" size="sm" className="flex items-center space-x-2">
                <Shield className="w-4 h-4" />
                <span>Admin</span>
              </Button>
            </Link>
          </div>

          {/* Mobile Menu Button */}
          <div className="md:hidden">
            <button
              onClick={() => setMobileMenuOpen(!mobileMenuOpen)}
              className="text-gray-700 hover:text-primary transition-colors"
            >
              {mobileMenuOpen ? (
                <X className="h-6 w-6" />
              ) : (
                <Menu className="h-6 w-6" />
              )}
            </button>
          </div>
        </div>

        {/* Mobile Menu */}
        <AnimatePresence>
          {mobileMenuOpen && (
            <motion.div
              initial={{ opacity: 0, height: 0 }}
              animate={{ opacity: 1, height: "auto" }}
              exit={{ opacity: 0, height: 0 }}
              className="md:hidden border-t border-gray-200"
            >
              <div className="py-4 space-y-4">
                {navItems.map((item) => (
                  <Link key={item.path} href={item.path}>
                    <span
                      className={`block font-medium transition-colors cursor-pointer ${
                        location === item.path
                          ? "text-primary"
                          : "text-gray-700 hover:text-primary"
                      }`}
                      onClick={() => setMobileMenuOpen(false)}
                    >
                      {item.label}
                    </span>
                  </Link>
                ))}
                
                {/* Superadmin Login Link for Mobile */}
                <Link href="/superadmin/login">
                  <Button variant="outline" size="sm" className="flex items-center space-x-2 w-full justify-center">
                    <Shield className="w-4 h-4" />
                    <span>Admin Login</span>
                  </Button>
                </Link>
              </div>
            </motion.div>
          )}
        </AnimatePresence>
      </div>
    </nav>
  );
}
